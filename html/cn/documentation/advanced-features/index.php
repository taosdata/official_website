<!DOCTYPE html><html lang='cn'><head><?php include($_SERVER['DOCUMENT_ROOT'] . '/cn/lang.php') ?><title>文档 | 涛思数据</title><meta name='description' content='TDengine是一个开源的专为物联网、车联网、工业互联网、IT运维等设计和优化的大数据平台。除核心的快10倍以上的时序数据库功能外，还提供缓存、数据订阅、流式计算等功能，最大程度减少研发和运维的工作量。'><meta name='keywords' content='大数据，Big Data，开源，物联网，车联网，工业互联网，IT运维, 时序数据库，缓存，数据订阅，消息队列，流式计算，开源，涛思数据，TAOS Data, TDengine'><meta name='title' content='文档 | 涛思数据'><meta property='og:site_name' content='涛思数据'/><meta property='og:title' content='文档 | 涛思数据'/><meta property='og:type' content='article'/><meta property='og:url' content='https://www.taosdata.com/<?php echo $lang; ?>/documentation/advanced-features-ch/index.php'/><meta property='og:description' content='TDengine是一个开源的专为物联网、车联网、工业互联网、IT运维等设计和优化的大数据平台。除核心的快10倍以上的时序数据库功能外，还提供缓存、数据订阅、流式计算等功能，最大程度减少研发和运维的工作量。' /><?php $s=$_SERVER['DOCUMENT_ROOT']."/$lang";include($s.'/head.php');?><link rel='canonical' href='https://www.taosdata.com/<?php echo $lang; ?>/documentation/advanced-features-ch/index.php'/><link rel='stylesheet' href='/lib/docs/taosdataprettify.css'><link rel='stylesheet' href='/lib/docs/docs.css?v=2'><script src='/lib/docs/prettify.js'></script><script src='/lib/docs/prettyprint-sql.js'></script></head><body><?php include($s.'/header.php'); ?><script>$('#documentation-href').addClass('active')</script><div class='container-fluid'><main class='content-wrapper'><section class='documentation'><h1>高级功能</h1>
<a class='anchor' id='连续查询(Continuous-Query)'></a><h2>连续查询(Continuous Query)</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/advanced%20features-ch.md#连续查询(continuous-query)' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>连续查询是TDengine定期自动执行的查询，采用滑动窗口的方式进行计算，是一种简化的时间驱动的流式计算。针对库中的表或超级表，TDengine可提供定期自动执行的连续查询，用户可让TDengine推送查询的结果，也可以将结果再写回到TDengine中。每次执行的查询是一个时间窗口，时间窗口随着时间流动向前滑动。在定义连续查询的时候需要指定时间窗口（time window, 参数interval ）大小和每次前向增量时间（forward sliding times, 参数sliding）。</p>
<p>TDengine的连续查询采用时间驱动模式，可以直接使用TAOS SQL进行定义，不需要额外的操作。使用连续查询，可以方便快捷地按照时间窗口生成结果，从而对原始采集数据进行降采样（down sampling）。用户通过TAOS SQL定义连续查询以后，TDengine自动在最后的一个完整的时间周期末端拉起查询，并将计算获得的结果推送给用户或者写回TDengine。</p>
<p>TDengine提供的连续查询与普通流计算中的时间窗口计算具有以下区别：</p>
<ul>
<li><p>不同于流计算的实时反馈计算结果，连续查询只在时间窗口关闭以后才开始计算。例如时间周期是1天，那么当天的结果只会在23:59:59以后才会生成。</p></li>
<li><p>如果有历史记录写入到已经计算完成的时间区间，连续查询并不会重新进行计算，也不会重新将结果推送给用户。对于写回TDengine的模式，也不会更新已经存在的计算结果。</p></li>
<li><p>使用连续查询推送结果的模式，服务端并不缓存客户端计算状态，也不提供Exactly-Once的语意保证。如果用户的应用端崩溃，再次拉起的连续查询将只会从再次拉起的时间开始重新计算最近的一个完整的时间窗口。如果使用写回模式，TDengine可确保数据写回的有效性和连续性。</p></li>
</ul>
<h4>使用连续查询</h4>
<p>使用TAOS SQL定义连续查询的过程，需要调用API taos_stream在应用端启动连续查询。例如要对统计表FOO_TABLE 每1分钟统计一次记录数量，前向滑动的时间是30秒，SQL语句如下：</p>
<pre><code class="sql language-sql">SELECT COUNT(*) 
FROM FOO_TABLE 
INTERVAL(1M) SLIDING(30S)</code></pre>
<p>其中查询的时间窗口（time window）是1分钟，前向增量（forward sliding time）时间是30秒。也可以不使用sliding来指定前向滑动时间，此时系统将自动向前滑动一个查询时间窗口再开始下一次计算，即时间窗口长度等于前向滑动时间。</p>
<pre><code class="sql language-sql">SELECT COUNT(*) 
FROM FOO_TABLE 
INTERVAL(1M)</code></pre>
<p>如果需要将连续查询的计算结果写回到数据库中，可以使用如下的SQL语句</p>
<pre><code class="sql language-sql">CREATE TABLE QUERY_RES 
  AS 
  SELECT COUNT(*) 
  FROM FOO_TABLE 
  INTERVAL(1M) SLIDING(30S)</code></pre>
<p>此时系统将自动创建表QUERY_RES，然后将连续查询的结果写入到该表。需要注意的是，前向滑动时间不能大于时间窗口的范围。如果用户指定的前向滑动时间超过时间窗口范围，系统将自动将其设置为时间窗口的范围值。如上所示SQL语句，如果用户设置前向滑动时间超过1分钟，系统将强制将其设置为1分钟。 </p>
<p>此外，TDengine还支持用户指定连续查询的结束时间，默认如果不输入结束时间，连续查询将永久运行，如果用户指定了结束时间，连续查询在系统时间达到指定的时间以后停止运行。如SQL所示，连续查询将运行1个小时，1小时之后连续查询自动停止。</p>
<pre><code class="sql language-sql">CREATE TABLE QUERY_RES 
  AS 
  SELECT COUNT(*) 
  FROM FOO_TABLE 
  WHERE TS &gt; NOW AND TS &lt;= NOW + 1H 
  INTERVAL(1M) SLIDING(30S) </code></pre>
<p>此外，还需要注意的是查询时间窗口的最小值是10毫秒，没有时间窗口范围的上限。</p>
<h4>管理连续查询</h4>
<p>用户可在控制台中通过 <em>show streams</em> 命令来查看系统中全部运行的连续查询，并可以通过 <em>kill stream</em> 命令杀掉对应的连续查询。在写回模式中，如果用户可以直接将写回的表删除，此时连续查询也会自动停止并关闭。后续版本会提供更细粒度和便捷的连续查询管理命令。</p>
<a class='anchor' id='数据订阅(Publisher/Subscriber)'></a><h2>数据订阅(Publisher/Subscriber)</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/advanced%20features-ch.md#数据订阅(publisher/subscriber)' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>基于数据天然的时间序列特性，TDengine的数据写入（insert）与消息系统的数据发布（pub）逻辑上一致，均可视为系统中插入一条带时间戳的新记录。同时，TDengine在内部严格按照数据时间序列单调递增的方式保存数据。本质上来说，TDengine中里每一张表均可视为一个标准的消息队列。</p>
<p>TDengine内嵌支持轻量级的消息订阅与推送服务。使用系统提供的API，用户可使用普通查询语句订阅数据库中的一张或多张表。订阅的逻辑和操作状态的维护均是由客户端完成，客户端定时轮询服务器是否有新的记录到达，有新的记录到达就会将结果反馈到客户。</p>
<p>TDengine的订阅与推送服务的状态是客户端维持，TDengine服务器并不维持。因此如果应用重启，从哪个时间点开始获取最新数据，由应用决定。</p>
<p>订阅相关API文档请见 <a href="https://www.taosdata.com/cn/documentation/connector/#C/C++-%E6%95%B0%E6%8D%AE%E8%AE%A2%E9%98%85%E6%8E%A5%E5%8F%A3">C/C++ 数据订阅接口</a>，《<a href="https://www.taosdata.com/blog/2020/02/12/1277.html">TDEngine中订阅的用途和用法</a>》则以一个示例详细介绍了这些ＡＰＩ的用法。</p>
<a class='anchor' id='缓存-(Cache)'></a><h2>缓存 (Cache)</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/advanced%20features-ch.md#缓存-(cache)' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>TDengine采用时间驱动缓存管理策略（First-In-First-Out，FIFO），又称为写驱动的缓存管理机制。这种策略有别于读驱动的数据缓存模式（Least-Recent-Use，LRU），直接将最近写入的数据保存在系统的缓存中。当缓存达到临界值的时候，将最早的数据批量写入磁盘。一般意义上来说，对于物联网数据的使用，用户最为关心最近产生的数据，即当前状态。TDengine充分利用了这一特性，将最近到达的（当前状态）数据保存在缓存中。</p>
<p>TDengine通过查询函数向用户提供毫秒级的数据获取能力。直接将最近到达的数据保存在缓存中，可以更加快速地响应用户针对最近一条或一批数据的查询分析，整体上提供更快的数据库查询响应能力。从这个意义上来说，可通过设置合适的配置参数将TDengine作为数据缓存来使用，而不需要再部署额外的缓存系统，可有效地简化系统架构，降低运维的成本。需要注意的是，TDengine重启以后系统的缓存将被清空，之前缓存的数据均会被批量写入磁盘，缓存的数据将不会像专门的Key-value缓存系统再将之前缓存的数据重新加载到缓存中。</p>
<p>TDengine分配固定大小的内存空间作为缓存空间，缓存空间可根据应用的需求和硬件资源配置。通过适当的设置缓存空间，TDengine可以提供极高性能的写入和查询的支持。TDengine中每个虚拟节点（virtual node）创建时分配独立的缓存池。每个虚拟节点管理自己的缓存池，不同虚拟节点间不共享缓存池。每个虚拟节点内部所属的全部表共享该虚拟节点的缓存池。</p>
<p>TDengine将内存池按块划分进行管理，数据在内存块里按照列式存储。一个vnode的内存池是在vnode创建时按块分配好的，而且每个内存块按照先进先出的原则进行管理。一张表所需要的内存块是从vnode的内存池中进行分配的，块的大小由系统配置参数cache决定。每张表最大内存块的数目由配置参数tblocks决定，每张表平均的内存块的个数由配置参数ablocks决定。因此对于一个vnode, 总的内存大小为: <code>cache * ablocks * tables</code>。内存块参数cache不宜过小，一个cache block需要能存储至少几十条以上记录，才会有效率。参数ablocks最小为2，保证每张表平均至少能分配两个内存块。</p>
<p>你可以通过函数last_row快速获取一张表或一张超级表的最后一条记录，这样很便于在大屏显示各设备的实时状态或采集值。例如：</p>
<pre><code class="mysql language-mysql">select last_row(degree) from thermometer where location='beijing';</code></pre>
<p>该SQL语句将获取所有位于北京的传感器最后记录的温度值。</p></section></main></div><?php include($s.'/footer.php'); ?><script>$('pre').addClass('prettyprint linenums');PR.prettyPrint()</script><script src='/lib/docs/liner.js'></script></body></html>
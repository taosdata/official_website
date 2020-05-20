<!DOCTYPE html>
<html lang='cn'>

<head>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/cn/lang.php') ?>
  <title>文档 | TDengine</title>
  <meta name='description' content='TDengine是一个开源的专为物联网、车联网、工业互联网、IT运维等设计和优化的大数据平台。除核心的快10倍以上的时序数据库功能外，还提供缓存、数据订阅、流式计算等功能，最大程度减少研发和运维的工作量。'>
  <meta name='keywords' content='大数据，Big Data，开源，物联网，车联网，工业互联网，IT运维, 时序数据库，缓存，数据订阅，消息队列，流式计算，开源，涛思数据，TAOS Data, TDengine'>
  <meta name='title' content='文档 | 涛思数据'>
  <meta property='og:site_name' content='涛思数据' />
  <meta property='og:title' content='文档 | 涛思数据' />
  <meta property='og:type' content='article' />
  <meta property='og:url' content='https://www.taosdata.com/<?php echo $lang; ?>/documentation' />
  <meta property='og:description' content='TDengine是一个开源的专为物联网、车联网、工业互联网、IT运维等设计和优化的大数据平台。除核心的快10倍以上的时序数据库功能外，还提供缓存、数据订阅、流式计算等功能，最大程度减少研发和运维的工作量。' />
  <?php $s=$_SERVER['DOCUMENT_ROOT']."/$lang";include($s.'/head.php');?>
  <link rel='canonical' href='https://www.taosdata.com/<?php echo $lang; ?>/documentation' />
  <link rel='stylesheet' href='/lib/docs/taosdataprettify.css'>
  <link rel='stylesheet' href='/lib/docs/docs.css'>
  <link rel='stylesheet' href='/styles/documentation/index.min.css'>
  <script src='/lib/docs/prettify.js'></script>
  <script src='/lib/docs/prettyprint-sql.js'></script>
</head>

<body>
  <?php include($s.'/header.php'); ?>
  <script>
    $('#documentation-href').addClass('active')
  </script>
  <div class='container-fluid'>
    <main class='content-wrapper'>
      <section class='documentation'>
        <h1>TDengine文档</h1>
        <p>TDengine是一个高效的存储、查询、分析时序大数据的平台，专为物联网、车联网、工业互联网、运维监测等优化而设计。您可以像使用关系型数据库MySQL一样来使用它，但建议您在使用前仔细阅读一遍下面的文档，特别是<a href="data-model-and-architecture">数据模型</a>与<a href="super-table">超级表</a>一节。除本文档之外，欢迎<a href="https://www.taosdata.com/downloads/TDengine%20White%20Paper.pdf">下载产品白皮书</a>。</p><a href='../getting-started'>
          <h2>立即开始</h2>
        </a>
        <ul>
          <li><a href='../getting-started/#快速上手'>快速上手</a>：下载、安装、体验，三秒钟搞定</li>
          <li><a href='../getting-started/#TDengine命令行程序'>TDengine命令行程序</a>：访问TDengine的简便方式 </li>
          <li><a href='../getting-started/#TDengine-极速体验'>极速体验</a>：运行示例程序，快速体验高效的数据插入、查询</li>
          <li><a href='../getting-started/#主要功能'>主要功能</a>：插入、查询、聚合、分析、缓存、订阅、流式计算等等</li>
          <li><a href='https://www.taosdata.com/blog/2020/02/03/用docker容器快速搭建一个devops监控demo/'>使用容器快速体验</a>：一个脚本就建立一个TDengine加Grafana的监控示例</li>
          <li><a href='https://www.taosdata.com/blog/2020/05/13/1509.html'>Docker镜像使用</a>：通过Docker容器方式来运行TDengine，省去安装步骤</li>
        </ul><a href='data-model-and-architecture'>
          <h2>数据模型和设计</h2>
        </a>
        <ul>
          <li><a href='data-model-and-architecture/#数据模型'>数据模型</a>：关系型数据库模型，但要求每个采集设备单独建表 </li>
          <li><a href='data-model-and-architecture/#主要模块'>主要模块</a>：包含管理节点、数据节点和客户端，数据节点支持虚拟化</li>
          <li><a href='data-model-and-architecture/#写入流程'>写入流程</a>：先写入WAL、之后写入缓存，再给应用确认</li>
          <li><a href='data-model-and-architecture/#数据存储'>数据存储</a>：数据按时间段切片、采取列存、不同数据类型不同压缩算法 </li>
        </ul><a href='taos-sql'>
          <h2>TAOS SQL</h2>
        </a>
        <ul>
          <li><a href='taos-sql/#支持的数据类型'>支持的数据类型</a>：支持时间戳、整型、浮点型、布尔型、字符型等多种数据类型 </li>
          <li><a href='taos-sql/#数据库管理'>数据库管理</a>：添加、删除、查看数据库</li>
          <li><a href='taos-sql/#表管理'>表管理</a>：添加、删除、查看、修改表</li>
          <li><a href='taos-sql/#数据写入'>数据写入</a>：支持单表单条、多条、多表多条写入，支持历史数据写入</li>
          <li><a href='taos-sql/#数据查询'>数据查询</a>：支持时间段、值过滤、排序、查询结果手动分页等</li>
          <li><a href='taos-sql/#SQL函数'>SQL函数</a>：支持各种聚合函数、选择函数、计算函数，如avg, min, diff等</li>
          <li><a href='taos-sql/#时间维度聚合'>时间维度聚合</a>：将表中数据按照时间段进行切割后聚合，降维处理</li>
        </ul><a href='super-table'>
          <h2>超级表STable：多表聚合</h2>
        </a>
        <ul>
          <li><a href='super-table/#什么是超级表'>什么是超级表</a>：一种创新的方式来管理和聚合同一类设备</li>
          <li><a href='super-table/#超级表管理'>超级表管理</a>：创建/删除、改变超级表 </li>
          <li><a href='super-table/#写数据时自动建子表'>写数据时自动建子表</a>：用超级表做模板，自动建表</li>
          <li><a href='super-table/#STable中TAG管理'>STable中TAG管理</a>：增加、删除、修改超级表或表的标签</li>
          <li><a href='super-table/#STable多表聚合'>STable多表聚合</a>：通过设置标签过滤条件，将一组表进行聚合</li>
          <li><a href='super-table/#STable使用示例'>STable使用示例</a>：解释超级表的使用</li>
        </ul><a href='advanced-features'>
          <h2>高级功能</h2>
        </a>
        <ul>
          <li><a href='advanced-features/#连续查询(Continuous-Query)'>连续查询(Continuous Query)</a>：基于滑动窗口，定时自动的对数据流进行查询计算</li>
          <li><a href='advanced-features/#数据订阅(Publisher/Subscriber)'>数据订阅(Publisher/Subscriber)</a>：象典型的消息队列，应用可订阅接收到的最新数据</li>
          <li><a href='advanced-features/#缓存-(Cache)'>缓存 (Cache)</a>：每个设备最新的数据都会缓存在内存中，可快速获取</li>
        </ul><a href='connector'>
          <h2>连接器</h2>
        </a>
        <ul>
          <li><a href='connector/#C/C++-Connector'>C/C++ Connector</a>：通过libtaos客户端的库，连接TDengine服务器的主要方法</li>
          <li><a href='connector/#Java-Connector'>Java Connector(JDBC)</a>：通过标准的JDBC API，给Java应用提供到TDengine的连接</li>
          <li><a href='connector/#Python-Connector'>Python Connector</a>：给Python应用提供一个连接TDengine服务器的驱动 </li>
          <li><a href='connector/#RESTful-Connector'>RESTful Connector</a>：提供一最简单的连接TDengine服务器的方式</li>
          <li><a href='connector/#Go-Connector'>Go Connector</a>：给Go应用提供一个连接TDengine服务器的驱动</li>
          <li><a href='connector/#Node.js-Connector'>Node.js Connector</a>：给Node.js应用提供一个链接TDengine服务器的驱动</li>
          <li><a href='connector/#CSharp-Connector'>C# Connector</a>：给C#应用提供一个链接TDengine服务器的驱动</li>
          <li><a href='connector/#Windows客户端及程序接口'>Windows客户端及程序接口</a>：在Windows平台下连接TDengine服务 </li>
        </ul><a href='connections-with-other-tools'>
          <h2>与其他工具/系统的连接</h2>
        </a>
        <ul>
          <li><a href='connections-with-other-tools/#Telegraf'>Telegraf</a>：将DevOps采集的数据发送到TDengine </li>
          <li><a href='connections-with-other-tools/#Grafana'>Grafana</a>：获取并可视化保存在TDengine的数据</li>
          <li><a href='connections-with-other-tools/#Matlab'>Matlab</a>：通过配置Matlab的JDBC数据源访问保存在TDengine的数据</li>
          <li><a href='connections-with-other-tools/#R'>R</a>：通过配置R的JDBC数据源访问保存在TDengine的数据 </li>
        </ul><a href='administrator'>
          <h2>系统管理</h2>
        </a>
        <ul>
          <li><a href='administrator/#文件目录结构'>文件目录结构</a>：TDengine数据文件、配置文件等所在目录</li>
          <li><a href='administrator/#服务端配置'>服务端配置</a>：端口，缓存大小，文件块大小和其他系统配置</li>
          <li><a href='administrator/#客户端配置'>客户端配置</a>：字符集、链接IP地址、缺省用户名、密码等配置</li>
          <li><a href='administrator/#用户管理'>用户管理</a>：添加、删除TDengine用户，修改用户密码</li>
          <li><a href='administrator/#数据导入'>数据导入</a>：可按脚本文件导入，也可按数据文件导入</li>
          <li><a href='administrator/#数据导出'>数据导出</a>：从shell按表导出，也可用taosdump工具做各种导出</li>
          <li><a href='administrator/#系统连接、任务查询管理'>系统连接、任务查询管理</a>：查询或停止现有的连接、查询和流式计算</li>
          <li><a href='administrator/#系统监控'>系统监控</a>：检查系统现有的连接、查询、流式计算，日志和事件等 </li>
        </ul>
	<h2>常用工具</h2>
	<ul>
  	 <li><a href="blog/2020/01/18/%e5%a6%82%e4%bd%95%e5%bf%ab%e9%80%9f%e9%aa%8c%e8%af%81%e6%80%a7%e8%83%bd%e5%92%8c%e4%b8%bb%e8%a6%81%e5%8a%9f%e8%83%bd%ef%bc%9ftdengine%e6%a0%b7%e4%be%8b%e6%95%b0%e6%8d%ae%e5%af%bc%e5%85%a5%e5%b7%a5/">TDengine样例数据导入工具</a></li>
   	<li><a href="blog/2020/01/13/%e7%94%a8influxdb%e5%bc%80%e6%ba%90%e7%9a%84%e6%80%a7%e8%83%bd%e6%b5%8b%e8%af%95%e5%b7%a5%e5%85%b7%e5%af%b9%e6%af%94influxdb%e5%92%8ctdengine/">TDengine性能对比测试工具</a></li>
	</ul>
	<a href='more-on-system-architecture'>
          <h2>TDengine的技术设计</h2>
        </a>
        <ul>
          <li><a href='more-on-system-architecture/#存储设计'>存储设计</a>：为时序数据专门优化设计的列式存储格式</li>
          <li><a href='more-on-system-architecture/#查询处理'>查询处理</a>：高效的查询计算时序数据的方法</li>
          <li><a href='more-on-system-architecture/#集群设计'>集群设计</a>：吸取NoSQL的优点，支持高可靠，支持线性扩展</li>
          <li><a href='../blog/?categories=3'>技术博客</a>：更多的技术分析和架构设计文章</li>
        </ul><a>
          <h2>TDengine的跨平台应用</h2>
        </a>
        <ul>
          <li><a href='blog/2019/07/26/如何编译tdengine的windows客户端/'>TDengine的Windows客户端编译方法</li>
          <li><a href='blog/2019/12/06/tdengine-arm版本编译和配置/'>TDengine ARM版本编译和配置</li>
        </ul>
        <a>
        <h2>TDengine与其他数据库的对比测试</h2>
        </a>
        <ul>
          <li><a href='blog/2020/01/13/用influxdb开源的性能测试工具对比influxdb和tdengine/'>用InfluxDB开源的性能测试工具对比InfluxDB和TDengine</li>
          <li><a href='blog/2019/08/21/tdengine与opentsdb对比测试/'>TDengine与OpenTSDB对比测试</li>
          <li><a href='blog/2019/08/14/tdengine与cassandra对比测试/'>TDengine与Cassandra对比测试</li>
         <li><a href='blog/2019/07/19/tdengine与influxdb对比测试/'>TDengine与InfluxDB对比测试</li>
         <li><a href="/downloads/TDengine_Testing_Report_cn.pdf" l id='download-report'>TDengine与InfluxDB、OpenTSDB、Cassandra、MySQL、ClickHouse等数据库的对比测试报告</li>
        </ul>
          <h2>物联网大数据</h2>
        </a>
        <ul>
          <li><a href="https://www.taosdata.com/blog/2019/07/09/物联网、工业互联网大数据的特点/">物联网、工业互联网大数据的特点</a></li>
          <li><a href="https://www.taosdata.com/blog/2019/07/29/物联网大数据平台应具备的功能和特点/">物联网大数据平台应具备的功能和特点</a></li>
          <li><a href="https://www.taosdata.com/blog/2019/07/09/通用互联网大数据处理架构为什么不适合处理物联/">通用大数据架构为什么不适合处理物联网数据？</a></li>
          <li><a href="https://www.taosdata.com/blog/2019/07/09/物联网、车联网、工业互联网大数据平台，为什么/">物联网、车联网、工业互联网大数据平台，为什么推荐使用TDengine？</a></li>
        </ul><a href='../faq'>
           <h2>培训和FAQ</h2>
        </a>
        <ul>
          <li><a href='https://www.taosdata.com/cn/faq'>FAQ</a>：常见问题与答案</li>
          <li><a href='https://www.taosdata.com/cn/blog/?categories=4'>应用案列</a>：一些使用实例来解释如何使用TDengine</li>
        </ul>

      </section>
    </main>
  </div>
  <?php include($s.'/footer.php'); ?>
  <script>
    $('pre').addClass('prettyprint linenums');
    PR.prettyPrint()
  </script>
  <script src='/lib/docs/liner.js'></script>
</body>

</html>
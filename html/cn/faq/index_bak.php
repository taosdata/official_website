<!DOCTYPE html>
<html lang='cn'>

<head>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/cn/lang.php') ?>
  <title>FAQ | TDengine</title>
  <meta name='description' content='TDengine是涛思数据推出的一款开源的专为物联网、车联网、工业互联网、IT运维等设计和优化的大数据平台。除核心的快10倍以上的时序数据库功能外，还提供缓存、数据订阅、流式计算等功能，最大程度减少研发和运维的工作量。'>
  <meta name='keywords' content='大数据，Big Data，开源，物联网，车联网，工业互联网，IT运维, 时序数据库，涛思数据，TAOS Data, TDengine'>
  <meta name='title' content='FAQ | TDengine'>
  <meta property='og:site_name' content='涛思数据 | TDengine' />
  <meta property='og:title' content='FAQ | TDengine' />
  <meta property='og:type' content='article' />
  <meta property='og:url' content='https://www.taosdata.com/<?php echo $lang; ?>/faq/index.php' />
  <meta property='og:description' content='TDengine是涛思数据推出的一款开源的专为物联网、车联网、工业互联网、IT运维等设计和优化的大数据平台。除核心的快10倍以上的时序数据库功能外，还提供缓存、数据订阅、流式计算等功能，最大程度减少研发和运维的工作量。' />
  <?php $s=$_SERVER['DOCUMENT_ROOT']."/$lang";include($s.'/head.php');?>
  <link rel='canonical' href='https://www.taosdata.com/<?php echo $lang; ?>/faq/index.php' />
  <link rel='stylesheet' href='/lib/docs/taosdataprettify.css'>
  <link rel='stylesheet' href='/lib/docs/docs.css'>
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
        <h1>常见问题</h1>
        <h4>1. 遇到错误"failed to connect to server", 我怎么办？</h4>
        <p>客户端遇到链接故障，请按照下面的步骤进行检查：</p>
        <ol>
          <li>在服务器，执行 <code>systemctl status taosd</code> 检查<em>taosd</em>运行状态。如果没有运行，启动<em>taosd</em></li>
          <li>确认客户端连接时指定了正确的服务器IP地址</li>
          <li>ping服务器IP，如果没有反应，请检查你的网络</li>
          <li>检查防火墙设置，确认TCP/UDP 端口6030-6039 是打开的</li>
          <li>对于Linux上的JDBC（ODBC, Python, Go等接口类似）连接, 确保<em>libtaos.so</em>在目录<em>/usr/local/lib/taos</em>里, 并且<em>/usr/local/lib/taos</em>在系统库函数搜索路径<em>LD_LIBRARY_PATH</em>里 </li>
          <li>对于windows上的JDBC, ODBC, Python, Go等连接，确保<em>driver/c/taos.dll</em>在你的系统搜索目录里 (建议<em>taos.dll</em>放在目录 <em>C:\Windows\System32</em>)</li>
          <li>如果仍不能排除连接故障，请使用命令行工具nc来分别判断指定端口的TCP和UDP连接是否通畅
            检查UDP端口连接是否工作：<code>nc -vuz {hostIP} {port}</code>
            检查服务器侧TCP端口连接是否工作：<code>nc -l {port}</code>
            检查客户端侧TCP端口链接是否工作：<code>nc {hostIP} {port}</code></li>
        </ol>
        <h4>2. 虽然语法正确，为什么我还是得到 "Invalid SQL" 错误</h4>
        <p>如果你确认语法正确，请检查SQL语句长度是否超过64K。如果超过，也会返回这个错误。</p>
        <h4>3. 为什么我删除超级表总是失败？</h4>
        <p>请确保超级表下已经没有其他表，否则系统不允许删除该超级表。</p>
        <h4>4. 是否支持validation queries?</h4>
        <p>TDengine还没有一组专用的validation queries。然而建议你使用系统监测的数据库”log"来做。</p>
        <h4>5. 我可以删除或更新一条记录吗？</h4>
        <p>不能。因为TDengine是为联网设备采集的数据设计的，不容许修改。但TDengine提供数据保留策略，只要数据记录超过保留时长，就会被自动删除。</p>
        <h4>6. 我怎么创建超过250列的表？</h4>
        <p>TDengine最大允许创建250列的表。但是如果确实超过，我们建议按照数据特性，逻辑地将这个宽表分解成几个小表。</p>
        <h4>7. 最有效的写入数据的方法是什么？</h4>
        <p>批量插入。每条写入语句可以一张表同时插入多条记录，也可以同时插入多张表的记录。</p>
        <h4>8. windows系统下插入的nchar类数据中的汉字被解析成了乱码如何解决？</h4>
        <p>windows下插入nchar类的数据中如果有中文，请先确认系统的地区设置成了中国（在Control Panel里可以设置），这时cmd中的<code>taos</code>客户端应该已经可以正常工作了；如果是在IDE里开发Java应用，比如Eclipse， Intellij，请确认IDE里的文件编码为GBK（这是Java默认的编码类型），然后在生成Connection时，初始化客户端的配置，具体语句如下：</p>
        <p>​ Class.forName("com.taosdata.jdbc.TSDBDriver");</p>
        <p>​ Properties properties = new Properties();</p>
        <p>​ properties.setProperty(TSDBDriver.LOCALE_KEY, "UTF-8");</p>
        <p>​ Connection = DriverManager.getConnection(url, properties);</p>
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
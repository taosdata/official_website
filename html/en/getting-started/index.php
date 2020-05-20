<!DOCTYPE html><html lang='en'><head><?php include($_SERVER['DOCUMENT_ROOT'] . '/en/lang.php') ?><title>Getting Started | TDengine</title><meta name='description' content='TDengine is an open-source big data platform for IoT. Along with a 10x faster time-series database, it provides caching, stream computing, message queuing, and other functionalities. It is designed and optimized for Internet of Things, Connected Cars, and Industrial IoT. Read the documentation for TDengine here to get started right away.'><meta name='keywords' content='TDengine, Big Data, Open Source, IoT, Connected Cars, Industrial IoT, time-series database, caching, stream computing, message queuing, IT infrastructure monitoring, application performance monitoring, Internet of Things,TAOS Data, Documentation, programming, coding, syntax, frequently asked questions, questions, faq'><meta name='title' content='Getting Started | TAOS Data'><meta property='og:site_name' content='TAOS Data'/><meta property='og:title' content='Getting Started | TAOS Data'/><meta property='og:type' content='article'/><meta property='og:url' content='https://www.taosdata.com/<?php echo $lang; ?>/getting-started'/><meta property='og:description' content='TDengine is an open-source big data platform for IoT. Along with a 10x faster time-series database, it provides caching, stream computing, message queuing, and other functionalities. It is designed and optimized for Internet of Things, Connected Cars, and Industrial IoT. Read the documentation for TDengine here to get started right away.' /><?php $s=$_SERVER['DOCUMENT_ROOT']."/$lang";include($s.'/head.php');?><link rel='canonical' href='https://www.taosdata.com/<?php echo $lang; ?>/getting-started'/><link rel='stylesheet' href='/lib/docs/taosdataprettify.css'><link rel='stylesheet' href='/lib/docs/docs.css'><script src='/lib/docs/prettify.js'></script><script src='/lib/docs/prettyprint-sql.js'></script><script>$(document).ready(function(){loadScript('scripts/index.js?v=3', function(){});});</script></head><body><?php include($s.'/header.php'); ?><script>$('#getting-started-href').addClass('active')</script><div class='container-fluid'><main class='content-wrapper'><section class='documentation'><h1>Getting Started</h1>
<a class='anchor' id='Quick-Start'></a><h2>Quick Start</h2>
<p>At the moment, TDengine server only runs on Linux, but client can run on either Windows or Linux. Supports X64 and ARM CPU systems. You can set up and install TDengine server either from the  <a href='#Install-from-Source'>source code</a> or the <a href='#Install-from-Package'>packages</a>. It takes only a few seconds from download to run it successfully. </p>
<a class='anchor' id='Install-from-Source'></a><h3>Install from Source</h3>
<p>Please visit our <a href="https://github.com/taosdata/TDengine">github page</a> for instructions on installation from the source code.</p>
<a class='anchor' id='Install-from-Package'></a><h3>Install from Package</h3>
<p>Three different packages for TDengine server are provided, please pick up the one you like. </p>
<ul id='packageList'>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/hidden/packages.php'; ?>
<li><a id='tdengine-rpm' style='color:var(--b2)'><?php echo $packagesNames['tdengine_rpm']; ?> (1.5M) </a></li>
<li><a id='tdengine-deb' style='color:var(--b2)'><?php echo $packagesNames['tdengine_deb']; ?> (1.7M)</a></li>
<li><a id='tdengine-tar' style='color:var(--b2)'><?php echo $packagesNames['tdengine_tar']; ?> (3.0M)</a></li>
</ul>
For TDengine client, please pick up either Windows or Linux below. If you are using Mac, please use RESTful connector
<ul>
<li><a id='tdengine-linux' style='color:var(--b2)'><?php echo $packagesNames['tdengine_linux']; ?> (2.7M)</a></li>
<li><a id='tdengine-win' style='color:var(--b2)'><?php echo $packagesNames['tdengine_win']; ?> (1.4M)</a></li>
</ul>
For Alert module, please pick up either Windows or Linux below, and please refer <a href="https://github.com/taosdata/tdengine/tree/develop_old/alert/README.md">this link</a> for the usage of the module.
<ul>
<li><a id='tdengine-alert-linux' style='color:var(--b2)'><?php echo $packagesNames['tdengine_alert_linux']; ?> (8.1M)</a></li>
<li><a id='tdengine-alert-windows' style='color:var(--b2)'><?php echo $packagesNames['tdengine_alert_windows']; ?> (9.2M)</a></li>
</ul>

AARCH32 Linux packages：
<ul>
<li><a id='tdengine-server-aarch32' style='color:var(--b2)'><?php echo $packagesNames['tdengine_server_aarch32']; ?> (1.9M)</a></li>
<li><a id='tdengine-server-aarch32-lite' style='color:var(--b2)'><?php echo $packagesNames['tdengine_server_aarch32_lite']; ?> (1.2M)</a></li>
<li><a id='tdengine-client-aarch32' style='color:var(--b2)'><?php echo $packagesNames['tdengine_client_aarch32']; ?> (1.0M)</a></li>
<li><a id='tdengine-client-aarch32-lite' style='color:var(--b2)'><?php echo $packagesNames['tdengine_client_aarch32_lite']; ?> (0.9M)</a></li>
</ul>
<p>To download the newest beta version and past versions of our packages, click <a href="../all-downloads/">here</a></p>
<p>For the time being, TDengine server only supports installation on Linux systems using <a href="https://en.wikipedia.org/wiki/Systemd"><code>systemd</code></a> as the service manager. To check if your system has <em>systemd</em>, use the <em>which</em> command.</p>
<pre><code class="cmd language-cmd">which systemd</code></pre>
<p>If the <code>systemd</code> command is not found, please <a href="#Install-from-Source">install from source code</a>. </p>
<a class='anchor' id='Running-TDengine'></a><h3>Running TDengine</h3>
<p>After installation, start the TDengine service by the <code>systemctl</code> command.</p>
<pre><code class="cmd language-cmd">systemctl start taosd</code></pre>
<p>Then check if the server is working now.</p>
<pre><code class="cmd language-cmd">systemctl status taosd</code></pre>
<p>If the service is running successfully, you can play around through TDengine shell <code>taos</code>, the command line interface tool located in directory /usr/local/bin/taos </p>
<p><strong>Note: The <em>systemctl</em> command needs the root privilege. Use <em>sudo</em> if you are not the <em>root</em> user.</strong></p>
<a class='anchor' id='TDengine-Shell'></a><h2>TDengine Shell</h2>
<p>To launch TDengine shell, the command line interface, in a Linux terminal, type:</p>
<pre><code class="cmd language-cmd">taos</code></pre>
<p>The welcome message is printed if the shell connects to TDengine server successfully, otherwise, an error message will be printed (refer to our <a href="../faq">FAQ</a> page for troubleshooting the connection error). The TDengine shell prompt is: </p>
<pre><code class="cmd language-cmd">taos&gt;</code></pre>
<p>In the TDengine shell, you can create databases, create tables and insert/query data with SQL. Each query command ends with a semicolon. It works like MySQL, for example:</p>
<pre><code class="mysql language-mysql">create database db;
use db;
create table t (ts timestamp, cdata int);
insert into t values ('2019-07-15 10:00:00', 10);
insert into t values ('2019-07-15 10:01:05', 20);
select * from t;
          ts          |   speed   |
===================================
 19-07-15 10:00:00.000|         10|
 19-07-15 10:01:05.000|         20|
Query OK, 2 row(s) in set (0.001700s)</code></pre>
<p>Besides the SQL commands, the system administrator can check system status, add or delete accounts, and manage the servers.</p>
<a class='anchor' id='Shell-Command-Line-Parameters'></a><h3>Shell Command Line Parameters</h3>
<p>You can run <code>taos</code> command with command line options to fit your needs. Some frequently used options are listed below:</p>
<ul>
<li>-c, --config-dir: set the configuration directory. It is <em>/etc/taos</em> by default</li>
<li>-h, --host: set the IP address of the server it will connect to, Default is localhost</li>
<li>-s, --commands: set the command to run without entering the shell</li>
<li>-u, -- user:  user name to connect to server. Default is root</li>
<li>-p, --password: password. Default is 'taosdata'</li>
<li>-?, --help: get a full list of supported options </li>
</ul>
<p>Examples:</p>
<pre><code class="cmd language-cmd">taos -h 192.168.0.1 -s "use db; show tables;"</code></pre>
<a class='anchor' id='Run-Batch-Commands'></a><h3>Run Batch Commands</h3>
<p>Inside TDengine shell, you can run batch commands in a file with <em>source</em> command.</p>
<pre><code>taos&gt; source &lt;filename&gt;;</code></pre>
<p>We have a demo file "demo.sql" with batch commands under the folder “/tests/examples/bash/”. You can replace the "filename" by our demo file and then take a quick try.</p>
<a class='anchor' id='Tips'></a><h3>Tips</h3>
<ul>
<li>Use up/down arrow key to check the command history</li>
<li>To change the default password, use "<code>alter user</code>" command </li>
<li>ctrl+c to interrupt any queries </li>
<li>To clean the cached schema of tables or STables, execute command <code>RESET QUERY CACHE</code> </li>
</ul>
<a class='anchor' id='Experience-10x-faster-insertion/query-speed'></a><h2>Experience 10x faster insertion/query speed</h2>
<p>After starting the TDengine server, you can execute the command "taosdemo" in the Linux terminal. For example: </p>
<pre><code>&gt; taosdemo</code></pre>
<p>Using this command, a stable named "meters" will be created in the database "test". There are 10k tables under this stable, named from "t0" to "t9999". In each table there are 100k rows of records, each row with columns （"f1", "f2" and "f3". "Timestamp" is from "2017-07-14 10:40:00 000" to "2017-07-14 10:41:39 999". Each table also has tags "areaid" and "loc": "areaid" is set from 1 to 10; "loc" is set to "beijing" or "shanghai". </p>
<p>It takes about 10 minutes to execute this command. Once finished, 1 billion rows of records will be inserted.</p>
<p>In the TDengine client, enter sql query commands and then experience our 10x faster query speed. </p>
<ul>
<li>query total rows of records：</li>
</ul>
<pre><code>taos&gt;select count(*) from test.meters;</code></pre>
<ul>
<li>query average, max and min of the total 1 billion records：</li>
</ul>
<pre><code>taos&gt;select avg(f1), max(f2), min(f3) from test.meters;</code></pre>
<ul>
<li>query the number of records where loc="beijing":</li>
</ul>
<pre><code>taos&gt;select count(*) from test.meters where loc="beijing";</code></pre>
<ul>
<li>query the average, max and min of total records where areaid=10：</li>
</ul>
<pre><code>taos&gt;select avg(f1), max(f2), min(f3) from test.meters where areaid=10;</code></pre>
<ul>
<li>query the average, max, min from table t10 when aggregating over every 10s: </li>
</ul>
<pre><code>taos&gt;select avg(f1), max(f2), min(f3) from test.t10 interval(10s);</code></pre>
<p>Note: you can run command "taosdemo" with many options, like number of tables, rows of records and so on. To know more about these options, you can execute "taosdemo --help" and then take a try using different options. </p>
<a class='anchor' id='Major-Features'></a><h2>Major Features</h2>
<p>The core functionality of TDengine is the time-series database. To reduce the development and management complexity, and to improve the system efficiency further, TDengine also provides caching, pub/sub messaging system, and stream computing functionalities. It provides a full stack for IoT big data platform. The detailed features are listed below:</p>
<ul>
<li><p>SQL like query language used to insert or explore data</p></li>
<li><p>C/C++, Java(JDBC), Python, Go, RESTful, and Node.JS interfaces for development</p></li>
<li><p>Ad hoc queries/analysis via Python/R/Matlab or TDengine shell</p></li>
<li><p>Continuous queries to support sliding-window based stream computing</p></li>
<li><p>Super table to aggregate multiple time-streams efficiently with flexibility  </p></li>
<li><p>Aggregation over a time window on one or multiple time-streams</p></li>
<li><p>Built-in messaging system to support publisher/subscriber model</p></li>
<li><p>Built-in cache for each time stream to make latest data available as fast as light speed</p></li>
<li><p>Transparent handling of historical data and real-time data </p></li>
<li><p>Integrating with Telegraf, Grafana and other tools seamlessly  </p></li>
<li><p>A set of tools or configuration to manage TDengine </p></li>
</ul>
<p>For enterprise edition, TDengine provides more advanced features below:</p>
<ul>
<li><p>Linear scalability to deliver higher capacity/throughput </p></li>
<li><p>High availability to guarantee the carrier-grade service  </p></li>
<li><p>Built-in replication between nodes which may span multiple geographical sites </p></li>
<li><p>Multi-tier storage to make historical data management simpler and cost-effective</p></li>
<li><p>Web-based management tools and other tools to make maintenance simpler</p></li>
</ul>
<p>TDengine is specially designed and optimized for time-series data processing in IoT, connected cars, Industrial IoT, IT infrastructure and application monitoring, and other scenarios. Compared with other solutions, it is 10x faster on insert/query speed. With a single-core machine, over 20K requestes can be processed, millions data points can be ingested, and over 10 million data points can be retrieved in a second. Via column-based storage and tuned compression algorithm for different data types, less than 1/10 storage space is required. </p>
<a class='anchor' id='Explore-More-on-TDengine'></a><h2>Explore More on TDengine</h2>
<p>Please read through the whole <a href='../documentation'>documentation</a> to learn more about TDengine.</p></section></main></div><?php include($s.'/footer.php'); ?><script>$('pre').addClass('prettyprint linenums');PR.prettyPrint()</script><script src='/lib/docs/liner.js'></script></body></html>

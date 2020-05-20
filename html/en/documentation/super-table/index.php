<!DOCTYPE html><html lang='en'><head><?php include($_SERVER['DOCUMENT_ROOT'] . '/en/lang.php') ?><title>Documentation | TAOS Data</title><meta name='description' content='TDengine is an open-source big data platform for IoT. Along with a 10x faster time-series database, it provides caching, stream computing, message queuing, and other functionalities. It is designed and optimized for Internet of Things, Connected Cars, and Industrial IoT. Read the documentation for TDengine here to get started right away.'><meta name='keywords' content='TDengine, Big Data, Open Source, IoT, Connected Cars, Industrial IoT, time-series database, caching, stream computing, message queuing, IT infrastructure monitoring, application performance monitoring, Internet of Things,TAOS Data, Documentation, programming, coding, syntax, frequently asked questions, questions, faq'><meta name='title' content='Documentation | TAOS Data'><meta property='og:site_name' content='TAOS Data'/><meta property='og:title' content='Documentation | TAOS Data'/><meta property='og:type' content='article'/><meta property='og:url' content='https://www.taosdata.com/<?php echo $lang; ?>/documentation/super-table/index.php'/><meta property='og:description' content='TDengine is an open-source big data platform for IoT. Along with a 10x faster time-series database, it provides caching, stream computing, message queuing, and other functionalities. It is designed and optimized for Internet of Things, Connected Cars, and Industrial IoT. Read the documentation for TDengine here to get started right away.' /><?php $s=$_SERVER['DOCUMENT_ROOT']."/$lang";include($s.'/head.php');?><link rel='canonical' href='https://www.taosdata.com/<?php echo $lang; ?>/documentation/super-table/index.php'/><link rel='stylesheet' href='/lib/docs/taosdataprettify.css'><link rel='stylesheet' href='/lib/docs/docs.css?v=2'><script src='/lib/docs/prettify.js'></script><script src='/lib/docs/prettyprint-sql.js'></script></head><body><?php include($s.'/header.php'); ?><script>$('#documentation-href').addClass('active')</script><div class='container-fluid'><main class='content-wrapper'><section class='documentation'><h1>STable: Super Table</h1>
<p>"One Table for One Device" design can improve the insert/query performance significantly for a single device. But it has a side effect, the aggregation of multiple tables becomes hard. To reduce the complexity and improve the efficiency, TDengine introduced a new concept: STable (Super Table).  </p>
<a class='anchor' id='What-is-a-Super-Table'></a><h2>What is a Super Table</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/Super%20Table.md#what-is-a-super-table' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>STable is an abstract and a template for a type of device. A STable contains a set of devices (tables) that have the same schema or data structure. Besides the shared schema, a STable has a set of tags, like the model, serial number and so on. Tags are used to record the static attributes for the devices and are used to group a set of devices (tables) for aggregation. Tags are metadata of a table and can be added, deleted or changed.   </p>
<p>TDengine does not save tags as a part of the data points collected. Instead, tags are saved as metadata. Each table has a set of tags. To improve query performance, tags are all cached and indexed. One table can only belong to one STable, but one STable may contain many tables. </p>
<p>Like a table, you can create, show, delete and describe STables. Most query operations on tables can be applied to STable too, including the aggregation and selector functions. For queries on a STable, if no tags filter, the operations are applied to all the tables created via this STable. If there is a tag filter, the operations are applied only to a subset of the tables which satisfy the tag filter conditions. It will be very convenient to use tags to put devices into different groups for aggregation.</p>
<a class='anchor' id='Create-a-STable'></a><h2>Create a STable</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/Super%20Table.md#create-a-stable' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>Similiar to creating a standard table, syntax is: </p>
<pre><code class="mysql language-mysql">CREATE TABLE &lt;stable_name&gt; (&lt;field_name&gt; TIMESTAMP, field_name1 field_type,…) TAGS(tag_name tag_type, …)</code></pre>
<p>New keyword "tags" is introduced, where tag_name is the tag name, and tag_type is the associated data type. </p>
<p>Note：</p>
<ol>
<li>The bytes of all tags together shall be less than 512 </li>
<li>Tag's data type can not be time stamp</li>
<li>Tag name shall be different from the field name</li>
<li>Tag name shall not be the same as system keywords</li>
<li>Maximum number of tags is 6 </li>
</ol>
<p>For example:</p>
<pre><code class="mysql language-mysql">create table thermometer (ts timestamp, degree float) 
tags (location binary(20), type int)</code></pre>
<p>The above statement creates a STable thermometer with two tag "location" and "type"</p>
<a class='anchor' id='Create-a-Table-via-STable'></a><h2>Create a Table via STable</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/Super%20Table.md#create-a-table-via-stable' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>To create a table for a device, you can use a STable as its template and assign the tag values. The syntax is:</p>
<pre><code class="mysql language-mysql">CREATE TABLE &lt;tb_name&gt; USING &lt;stb_name&gt; TAGS (tag_value1,...)</code></pre>
<p>You can create any number of tables via a STable, and each table may have different tag values. For example, you create five tables via STable thermometer below:</p>
<pre><code class="mysql language-mysql"> create table t1 using thermometer tags ('beijing', 10);
 create table t2 using thermometer tags ('beijing', 20);
 create table t3 using thermometer tags ('shanghai', 10);
 create table t4 using thermometer tags ('shanghai', 20);
 create table t5 using thermometer tags ('new york', 10);</code></pre>
<a class='anchor' id='Aggregate-Tables-via-STable'></a><h2>Aggregate Tables via STable</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/Super%20Table.md#aggregate-tables-via-stable' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>You can group a set of tables together by specifying the tags filter condition, then apply the aggregation operations. The result set can be grouped and ordered based on tag value. Syntax is：</p>
<pre><code class="mysql language-mysql">SELECT function&lt;field_name&gt;,… 
 FROM &lt;stable_name&gt; 
 WHERE &lt;tag_name&gt; &lt;[=|&lt;=|&gt;=|&lt;&gt;] values..&gt; ([AND|OR] …)
 INTERVAL (&lt;time range&gt;)
 GROUP BY &lt;tag_name&gt;, &lt;tag_name&gt;…
 ORDER BY &lt;tag_name&gt; &lt;asc|desc&gt;
 SLIMIT &lt;group_limit&gt;
 SOFFSET &lt;group_offset&gt;
 LIMIT &lt;record_limit&gt;
 OFFSET &lt;record_offset&gt;</code></pre>
<p>For the time being, STable supports only the following aggregation/selection functions: <em>sum, count, avg, first, last, min, max, top, bottom</em>, and the projection operations, the same syntax as a standard table.  Arithmetic operations are not supported, embedded queries not either. </p>
<p><em>INTERVAL</em> is used for the aggregation over a time range.</p>
<p>If <em>GROUP BY</em> is not used, the aggregation is applied to all the selected tables, and the result set is output in ascending order of the timestamp, but you can use "<em>ORDER BY _c0 ASC|DESC</em>" to specify the order you like. </p>
<p>If <em>GROUP BY <tag_name></em> is used, the aggregation is applied to groups based on tags. Each group is aggregated independently. Result set is a group of aggregation results. The group order is decided by <em>ORDER BY <tag_name></em>. Inside each group, the result set is in the ascending order of the time stamp. </p>
<p><em>SLIMIT/SOFFSET</em> are used to limit the number of groups and starting group number.</p>
<p><em>LIMIT/OFFSET</em> are used to limit the number of records in a group and the starting rows.</p>
<a class='anchor' id='Example-1:'></a><h3>Example 1:</h3>
<p>Check the average, maximum, and minimum temperatures of Beijing and Shanghai, and group the result set by location and type. The SQL statement shall be:</p>
<pre><code class="mysql language-mysql">SELECT COUNT(*), AVG(degree), MAX(degree), MIN(degree)
FROM thermometer
WHERE location='beijing' or location='tianjin'
GROUP BY location, type </code></pre>
<a class='anchor' id='Example-2:'></a><h3>Example 2:</h3>
<p>List the number of records, average, maximum, and minimum temperature every 10 minutes for the past 24 hours for all the thermometers located in Beijing with type 10. The SQL statement shall be:</p>
<pre><code class="mysql language-mysql">SELECT COUNT(*), AVG(degree), MAX(degree), MIN(degree)
FROM thermometer
WHERE location='beijing' and type=10 and ts&gt;=now-1d
INTERVAL(10M)</code></pre>
<a class='anchor' id='Create-Table-Automatically'></a><h2>Create Table Automatically</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/Super%20Table.md#create-table-automatically' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>Insert operation will fail if the table is not created yet. But for STable, TDengine can create the table automatically if the application provides the STable name, table name and tags' value when inserting data points. The syntax is:</p>
<pre><code class="mysql language-mysql">INSERT INTO &lt;tb_name&gt; USING &lt;stb_name&gt; TAGS (&lt;tag1_value&gt;, ...) VALUES (field_value, ...) (field_value, ...) ... &lt;tb_name2&gt; USING &lt;stb_name2&gt; TAGS(&lt;tag1_value2&gt;, ...) VALUES (&lt;field1_value1&gt;, ...) ...;</code></pre>
<p>When inserting data points into table tb_name, the system will check if table tb_name is created or not. If it is already created, the data points will be inserted as usual. But if the table is not created yet, the system will create the table tb_bame using STable stb_name as the template with the tags. Multiple tables can be specified in the SQL statement. </p>
<a class='anchor' id='Management-of-STables'></a><h2>Management of STables</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/Super%20Table.md#management-of-stables' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>After you can create a STable, you can describe, delete, change STables. This section lists all the supported operations.</p>
<a class='anchor' id='Show-STables-in-current-DB'></a><h3>Show STables in current DB</h3>
<pre><code class="mysql language-mysql">show stables;</code></pre>
<p>It lists all STables in current DB, including the name, created time, number of fileds, number of tags, and number of tables which are created via this STable. </p>
<a class='anchor' id='Describe-a-STable'></a><h3>Describe a STable</h3>
<pre><code class="mysql language-mysql">DESCRIBE &lt;stable_name&gt;</code></pre>
<p>It lists the STable's schema and tags</p>
<a class='anchor' id='Drop-a-STable'></a><h3>Drop a STable</h3>
<pre><code class="mysql language-mysql">DROP TABLE &lt;stable_name&gt;</code></pre>
<p>To delete a STable, all the tables created via this STable will be deleted first.</p>
<a class='anchor' id='List-the-Associated-Tables-of-a-STable'></a><h3>List the Associated Tables of a STable</h3>
<pre><code class="mysql language-mysql">SELECT TBNAME,[TAG_NAME,…] FROM &lt;stable_name&gt; WHERE &lt;tag_name&gt; &lt;[=|&lt;=|&gt;=|&lt;&gt;] values..&gt; ([AND|OR] …)</code></pre>
<p>It will list all the tables which satisfy the tag filter conditions. The tables are all created from this specific STable. TBNAME is a new keyword introduced, it is the table name associated with the STable. </p>
<pre><code class="mysql language-mysql">SELECT COUNT(TBNAME) FROM &lt;stable_name&gt; WHERE &lt;tag_name&gt; &lt;[=|&lt;=|&gt;=|&lt;&gt;] values..&gt; ([AND|OR] …)</code></pre>
<p>The above SQL statement will list the number of tables in a STable, which satisfy the filter condition.</p>
<a class='anchor' id='Management-of-Tags'></a><h2>Management of Tags</h2><a href='https://github.com/taosdata/TDengine/blob/develop/documentation/webdocs/markdowndocs/Super%20Table.md#management-of-tags' class='edit-link'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='24' height='24'><path d='M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z'/></svg></a>
<p>You can add, delete and change the tags for a STable, and you can change the tag value of a table. The SQL commands are listed below.  </p>
<a class='anchor' id='Add-a-Tag'></a><h3>Add a Tag</h3>
<pre><code class="mysql language-mysql">ALTER TABLE &lt;stable_name&gt; ADD TAG &lt;new_tag_name&gt; &lt;TYPE&gt;</code></pre>
<p>It adds a new tag to the STable with a data type. The maximum number of tags is 6. </p>
<a class='anchor' id='Drop-a-Tag'></a><h3>Drop a Tag</h3>
<pre><code class="mysql language-mysql">ALTER TABLE &lt;stable_name&gt; DROP TAG &lt;tag_name&gt;</code></pre>
<p>It drops a tag from a STable. The first tag could not be deleted, and there must be at least one tag.</p>
<a class='anchor' id='Change-a-Tag's-Name'></a><h3>Change a Tag's Name</h3>
<pre><code class="mysql language-mysql">ALTER TABLE &lt;stable_name&gt; CHANGE TAG &lt;old_tag_name&gt; &lt;new_tag_name&gt;</code></pre>
<p>It changes the name of a tag from old to new. </p>
<a class='anchor' id='Change-the-Tag's-Value'></a><h3>Change the Tag's Value</h3>
<pre><code class="mysql language-mysql">ALTER TABLE &lt;table_name&gt; SET TAG &lt;tag_name&gt;=&lt;new_tag_value&gt;</code></pre>
<p>It changes a table's tag value to a new one. </p></section></main></div><?php include($s.'/footer.php'); ?><script>$('pre').addClass('prettyprint linenums');PR.prettyPrint()</script><script src='/lib/docs/liner.js'></script></body></html>
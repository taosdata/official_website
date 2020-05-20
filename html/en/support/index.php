<!DOCTYPE html>
<html lang="en">

<head>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/en/lang.php') ?>
  <title>Support | TDengine</title>
  <meta name="description" content="TDengine is an open-source big data platform for IoT. Along with a 10x faster time-series database, it provides caching, stream computing, message queuing, and other functionalities. It is designed and optimized for Internet of Things, Connected Cars, and Industrial IoT. Get technical support here or look for local meetups on TDengine and other social medias.">
  <meta name="keywords" content="TDengine, Big Data, Open Source, IoT, Connected Cars, Industrial IoT, time-series database, caching, stream computing, message queuing, IT infrastructure monitoring, application performance monitoring, Internet of Things,TAOS Data, support, commercial support, customer support, help, faq, frequently asked questions, meetups, local meetups, online community, community, trainings, tutorials, social-media">
  <meta name="title" content="Support | TAOS Data">
  <meta property="og:site_name" content="TAOS Data" />
  <meta property="og:title" content="Support | TAOS Data" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://www.taosdata.com/<?php echo $lang; ?>/support" />
  <meta property="og:description" content="TDengine is an open-source big data platform for IoT. Along with a 10x faster time-series database, it provides caching, stream computing, message queuing, and other functionalities. It is designed and optimized for Internet of Things, Connected Cars, and Industrial IoT. Get technical support here or look for local meetups on TDengine and other social medias." />
  <?php $s=$_SERVER['DOCUMENT_ROOT']."/$lang";include($s.'/head.php');?>
  <link rel="canonical" href="https://www.taosdata.com/<?php echo $lang; ?>/support" />
  <link href="/styles/support/index.min.css" rel="stylesheet">
  <script>$(document).ready(function(){loadScript("scripts/index.js?v=2", function(){});});</script>
</head>

<body>
  <?php include($s.'/header.php'); ?>
  <script>
    $("#support-href").addClass('active')
  </script>
  <div class='container-fluid'>
    <main class='content-wrapper'>
      <h1>Support</h1>
      <h2 b>Online Community</h2>
      <ul>
        <li>For bug reports and suggestions, please submit an issue or make a pull request to <a l href="https://github.com/taosdata/TDengine">GitHub</a></li>
      <li>Other places where you can find people interested in TDengine</li>
      <li>Add WeChat "tdengine" to Join TDengine's group, you can communicate with other users. 
      </ul>
      <ul class='links-list' id='social-media-links'>
        <li><a l class='social-media-link wechat-social' style='color:var(--b2);'><svg class='social-media-link-svg' xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 576 512" style='margin-left:2px;margin-right: 0.4rem;'>
              <path fill="var(--sg1)" d="M385.2 167.6c6.4 0 12.6.3 18.8 1.1C387.4 90.3 303.3 32 207.7 32 100.5 32 13 104.8 13 197.4c0 53.4 29.3 97.5 77.9 131.6l-19.3 58.6 68-34.1c24.4 4.8 43.8 9.7 68.2 9.7 6.2 0 12.1-.3 18.3-.8-4-12.9-6.2-26.6-6.2-40.8-.1-84.9 72.9-154 165.3-154zm-104.5-52.9c14.5 0 24.2 9.7 24.2 24.4 0 14.5-9.7 24.2-24.2 24.2-14.8 0-29.3-9.7-29.3-24.2.1-14.7 14.6-24.4 29.3-24.4zm-136.4 48.6c-14.5 0-29.3-9.7-29.3-24.2 0-14.8 14.8-24.4 29.3-24.4 14.8 0 24.4 9.7 24.4 24.4 0 14.6-9.6 24.2-24.4 24.2zM563 319.4c0-77.9-77.9-141.3-165.4-141.3-92.7 0-165.4 63.4-165.4 141.3S305 460.7 397.6 460.7c19.3 0 38.9-5.1 58.6-9.9l53.4 29.3-14.8-48.6C534 402.1 563 363.2 563 319.4zm-219.1-24.5c-9.7 0-19.3-9.7-19.3-19.6 0-9.7 9.7-19.3 19.3-19.3 14.8 0 24.4 9.7 24.4 19.3 0 10-9.7 19.6-24.4 19.6zm107.1 0c-9.7 0-19.3-9.7-19.3-19.6 0-9.7 9.7-19.3 19.3-19.3 14.5 0 24.4 9.7 24.4 19.3.1 10-9.9 19.6-24.4 19.6z" /></svg>WeChat</a></li>
        <li><a href="https://weibo.com/u/6368262736" l class='social-media-link'><svg class='social-media-link-svg' xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" style='margin-left:2px;margin-right: 0.4rem;margin-top:0.2rem'>
              <path fill="var(--sg1)" d="M407 177.6c7.6-24-13.4-46.8-37.4-41.7-22 4.8-28.8-28.1-7.1-32.8 50.1-10.9 92.3 37.1 76.5 84.8-6.8 21.2-38.8 10.8-32-10.3zM214.8 446.7C108.5 446.7 0 395.3 0 310.4c0-44.3 28-95.4 76.3-143.7C176 67 279.5 65.8 249.9 161c-4 13.1 12.3 5.7 12.3 6 79.5-33.6 140.5-16.8 114 51.4-3.7 9.4 1.1 10.9 8.3 13.1 135.7 42.3 34.8 215.2-169.7 215.2zm143.7-146.3c-5.4-55.7-78.5-94-163.4-85.7-84.8 8.6-148.8 60.3-143.4 116s78.5 94 163.4 85.7c84.8-8.6 148.8-60.3 143.4-116zM347.9 35.1c-25.9 5.6-16.8 43.7 8.3 38.3 72.3-15.2 134.8 52.8 111.7 124-7.4 24.2 29.1 37 37.4 12 31.9-99.8-55.1-195.9-157.4-174.3zm-78.5 311c-17.1 38.8-66.8 60-109.1 46.3-40.8-13.1-58-53.4-40.3-89.7 17.7-35.4 63.1-55.4 103.4-45.1 42 10.8 63.1 50.2 46 88.5zm-86.3-30c-12.9-5.4-30 .3-38 12.9-8.3 12.9-4.3 28 8.6 34 13.1 6 30.8.3 39.1-12.9 8-13.1 3.7-28.3-9.7-34zm32.6-13.4c-5.1-1.7-11.4.6-14.3 5.4-2.9 5.1-1.4 10.6 3.7 12.9 5.1 2 11.7-.3 14.6-5.4 2.8-5.2 1.1-10.9-4-12.9z" /></svg>Weibo</a></li>
        <li><a href="https://twitter.com/TaosData" l class='social-media-link'><svg class='social-media-link-svg' xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" class="s-ion-icon">
              <path d="M492 109.5c-17.4 7.7-36 12.9-55.6 15.3 20-12 35.4-31 42.6-53.6-18.7 11.1-39.4 19.2-61.5 23.5C399.8 75.8 374.6 64 346.8 64c-53.5 0-96.8 43.4-96.8 96.9 0 7.6.8 15 2.5 22.1-80.5-4-151.9-42.6-199.6-101.3-8.3 14.3-13.1 31-13.1 48.7 0 33.6 17.2 63.3 43.2 80.7-16-.4-31-4.8-44-12.1v1.2c0 47 33.4 86.1 77.7 95-8.1 2.2-16.7 3.4-25.5 3.4-6.2 0-12.3-.6-18.2-1.8 12.3 38.5 48.1 66.5 90.5 67.3-33.1 26-74.9 41.5-120.3 41.5-7.8 0-15.5-.5-23.1-1.4C62.8 432 113.7 448 168.3 448 346.6 448 444 300.3 444 172.2c0-4.2-.1-8.4-.3-12.5C462.6 146 479 129 492 109.5z"></path>
            </svg>Twitter</a></li>
        <li><a href='https://github.com/taosdata/TDengine' l class='social-media-link'><svg class='social-media-link-svg' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="s-ion-icon">
              <path d="M256 32C132.3 32 32 134.9 32 261.7c0 101.5 64.2 187.5 153.2 217.9 1.4.3 2.6.4 3.8.4 8.3 0 11.5-6.1 11.5-11.4 0-5.5-.2-19.9-.3-39.1-8.4 1.9-15.9 2.7-22.6 2.7-43.1 0-52.9-33.5-52.9-33.5-10.2-26.5-24.9-33.6-24.9-33.6-19.5-13.7-.1-14.1 1.4-14.1h.1c22.5 2 34.3 23.8 34.3 23.8 11.2 19.6 26.2 25.1 39.6 25.1 10.5 0 20-3.4 25.6-6 2-14.8 7.8-24.9 14.2-30.7-49.7-5.8-102-25.5-102-113.5 0-25.1 8.7-45.6 23-61.6-2.3-5.8-10-29.2 2.2-60.8 0 0 1.6-.5 5-.5 8.1 0 26.4 3.1 56.6 24.1 17.9-5.1 37-7.6 56.1-7.7 19 .1 38.2 2.6 56.1 7.7 30.2-21 48.5-24.1 56.6-24.1 3.4 0 5 .5 5 .5 12.2 31.6 4.5 55 2.2 60.8 14.3 16.1 23 36.6 23 61.6 0 88.2-52.4 107.6-102.3 113.3 8 7.1 15.2 21.1 15.2 42.5 0 30.7-.3 55.5-.3 63 0 5.4 3.1 11.5 11.4 11.5 1.2 0 2.6-.1 4-.4C415.9 449.2 480 363.1 480 261.7 480 134.9 379.7 32 256 32z"></path>
            </svg>Github</a></li>
        <!--<li><a href="#" l class='social-media-link'><svg class='social-media-link-svg' width="20" height="20" class="m-r-10" viewBox="0 0 38 38">
              <path d="M32 20v12h-32v-12h4v8h24v-8zM6 22h20v4h-20zM6.473 17.671l0.866-3.905 19.526 4.328-0.866 3.905zM8.739 9.642l1.69-3.625 18.126 8.452-1.69 3.625zM30.991 11.296l-2.435 3.173-15.867-12.175 1.761-2.294h1.82z"></path>
            </svg>Stack Overflow</a></li>-->
      </ul>
      <h2 b>Local Meetups</h2>
      <ul>
        <li>Beijing Meetup Group</li>
        <li>San Diego Meetup Group</li>
      </ul>
      <h2 b>Trainings</h2>
      <ul>
        <li>Videos on youtube, youku</li>
        <li>Webinars</li>
      </ul>
      <h2 b>Commercial Support</h2>
      <p>For enterprise and cloud edition, there is a dedicated 7*24 customer service team. Once you purchase the product or service, an account manager and hot phone line will be assigned to you.</p>
      <h2 b>Contact us:</h2>
      <ul>
        <li>Office: Suite 5-1407 CCT Center, Lai Guangying West Rd, Chaoyang, Beijing</li>
        <li>Business: <a l href='mailto:business@taosdata.com'>business@taosdata.com</a></li>
        <li>Talents: <a l href='mailto:hr@taosdata.com' target='_blank' class='url'>hr@taosdata.com</a></li>
      </ul>

    </main>
  </div>
  <?php include($s.'/footer.php'); ?>
</body>

</html>

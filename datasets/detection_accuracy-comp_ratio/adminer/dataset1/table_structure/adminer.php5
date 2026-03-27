<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>Table: employees - Adminer</title>
<link rel="stylesheet" type="text/css" href="adminer.php?file=default.css&amp;version=4.6.4-dev">
<script src='adminer.php?file=functions.js&amp;version=4.6.4-dev' nonce="MDMyMjEwZDc5Yjk5YjRkMDY1ZDJiODQxYjliMTRkNDI="></script>
<link rel="shortcut icon" type="image/x-icon" href="adminer.php?file=favicon.ico&amp;version=4.6.4-dev">
<link rel="apple-touch-icon" href="adminer.php?file=favicon.ico&amp;version=4.6.4-dev">

<body class="ltr nojs">
<script nonce="MDMyMjEwZDc5Yjk5YjRkMDY1ZDJiODQxYjliMTRkNDI=">
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
var thousandsSeparator = ',';
</script>

<div id="help" class="jush-sql jsonly hidden"></div>
<script nonce="MDMyMjEwZDc5Yjk5YjRkMDY1ZDJiODQxYjliMTRkNDI=">mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});</script>

<div id="content">
<p id="breadcrumb"><a href="adminer.php">MySQL</a> &raquo; <a href='adminer.php?username=root' accesskey='1' title='Alt+Shift+1'>Server</a> &raquo; <a href="adminer.php?username=root&amp;db=employees">employees</a> &raquo; Table: employees
<h2>Table: employees</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>
<p class="links"> <a href='adminer.php?username=root&amp;db=employees&amp;select=employees'>Select data</a> <a href='adminer.php?username=root&amp;db=employees&amp;table=employees' class='active '>Show structure</a> <a href='adminer.php?username=root&amp;db=employees&amp;create=employees'>Alter table</a> <a href='adminer.php?username=root&amp;db=employees&amp;edit=employees'>New item</a>
<table cellspacing='0' class='nowrap'>
<thead><tr><th>Column<td>Type<td>Comment</thead>
<tr><th>emp_no<td><span title=''>int(11)</span><td>
<tr class="odd"><th>birth_date<td><span title=''>date</span><td>
<tr><th>first_name<td><span title='latin1_swedish_ci'>varchar(14)</span><td>
<tr class="odd"><th>last_name<td><span title='latin1_swedish_ci'>varchar(16)</span><td>
<tr><th>gender<td><span title='latin1_swedish_ci'>enum(&#039;M&#039;,&#039;F&#039;)</span><td>
<tr class="odd"><th>hire_date<td><span title=''>date</span><td>
</table>
<h3 id='indexes'>Indexes</h3>
<table cellspacing='0'>
<tr title='PRIMARY'><th>PRIMARY<td><i>emp_no</i>
</table>
<p class="links"><a href="adminer.php?username=root&amp;db=employees&amp;indexes=employees">Alter indexes</a>
<h3 id='foreign-keys'>Foreign keys</h3>
<p class="links"><a href="adminer.php?username=root&amp;db=employees&amp;foreign=employees">Add foreign key</a>
<h3 id='triggers'>Triggers</h3>
<p class="links"><a href="adminer.php?username=root&amp;db=employees&amp;trigger=employees">Add trigger</a>
</div>

<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="510097:791382">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target="_blank" rel="noreferrer noopener" id='h1'>Adminer</a> <span class="version">4.6.4-dev</span>
<a href="https://www.adminer.org/#download" target="_blank" rel="noreferrer noopener" id="version"></a>
</h1>
<script src='adminer.php?file=jush.js&amp;version=4.6.4-dev' nonce="MDMyMjEwZDc5Yjk5YjRkMDY1ZDJiODQxYjliMTRkNDI="></script>
<script nonce="MDMyMjEwZDc5Yjk5YjRkMDY1ZDJiODQxYjliMTRkNDI=">
var jushLinks = { sql: [ 'adminer.php?username=root&db=employees&table=$&', /\b(current_dept_emp|departments|dept_emp|dept_emp_latest_date|dept_manager|employees|salaries|titles)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.7');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="username" value="root"><span title='database'>DB</span>: <select name='db'><option value=""><option>addressbook<option selected>employees<option>information_schema<option>mysql<option>performance_schema<option>sys</select><script nonce="MDMyMjEwZDc5Yjk5YjRkMDY1ZDJiODQxYjliMTRkNDI=">mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});</script>
<input type='submit' value='Use' class='hidden'>
</p></form>
<p class='links'><a href='adminer.php?username=root&amp;db=employees&amp;sql='>SQL command</a>
<a href='adminer.php?username=root&amp;db=employees&amp;import='>Import</a>
<a href='adminer.php?username=root&amp;db=employees&amp;dump=employees' id='dump'>Export</a>
<a href="adminer.php?username=root&amp;db=employees&amp;create=">Create table</a>
<ul id='tables'><script nonce="MDMyMjEwZDc5Yjk5YjRkMDY1ZDJiODQxYjliMTRkNDI=">mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});</script>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=current_dept_emp" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=current_dept_emp" class='view' title='Show structure'>current_dept_emp</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=departments" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=departments" class='structure' title='Show structure'>departments</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_emp" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_emp" class='structure' title='Show structure'>dept_emp</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_emp_latest_date" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_emp_latest_date" class='view' title='Show structure'>dept_emp_latest_date</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_manager" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_manager" class='structure' title='Show structure'>dept_manager</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=employees" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=employees" class='active structure' title='Show structure'>employees</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=salaries" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=salaries" class='structure' title='Show structure'>salaries</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=titles" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=titles" class='structure' title='Show structure'>titles</a>
</ul>
</div>
<script nonce="MDMyMjEwZDc5Yjk5YjRkMDY1ZDJiODQxYjliMTRkNDI=">setupSubmitHighlight(document);</script>

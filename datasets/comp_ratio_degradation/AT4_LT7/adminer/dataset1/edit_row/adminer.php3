<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>Edit: current_dept_emp - Adminer</title>
<link rel="stylesheet" type="text/css" href="adminer.php?file=default.css&amp;version=4.6.4-dev">
<script src='adminer.php?file=functions.js&amp;version=4.6.4-dev' nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE="></script>
<link rel="shortcut icon" type="image/x-icon" href="adminer.php?file=favicon.ico&amp;version=4.6.4-dev">
<link rel="apple-touch-icon" href="adminer.php?file=favicon.ico&amp;version=4.6.4-dev">

<body class="ltr nojs">
<script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
var thousandsSeparator = ',';
</script>

<div id="help" class="jush-sql jsonly hidden"></div>
<script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});</script>

<div id="content">
<p id="breadcrumb"><a href="adminer.php">MySQL</a> &raquo; <a href='adminer.php?username=root' accesskey='1' title='Alt+Shift+1'>Server</a> &raquo; <a href="adminer.php?username=root&amp;db=employees">employees</a> &raquo; <a href='adminer.php?username=root&amp;db=employees&amp;select=current_dept_emp'>current_dept_emp</a> &raquo; Edit
<h2>Edit: current_dept_emp</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>
<form action="" method="post" enctype="multipart/form-data" id="form">
<table cellspacing='0'><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">qsl('table').onkeydown = editingKeydown;</script>
<tr><th><span title="BPBPBPB{int(11)BPBPBPB}">BPBPBPB{emp_noBPBPBPB}</span><td class='function'><select name='function[BPBPBPB{emp_noBPBPBPB}]'><option selected><option>BPBPBPB{+BPBPBPB}<option>BPBPBPB{-BPBPBPB}<option>BPBPBPB{SQLBPBPBPB}</select><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, getTarget(event).value.replace(/^SQL$/, ''), 1) }, onmouseout: helpMouseout});</script><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">qsl('select').onchange = functionChange;</script><td><input type='number' value='BPBPBPB{10005BPBPBPB}' data-maxlength='BPBPBPB{11BPBPBPB}' name='fields[BPBPBPB{emp_noBPBPBPB}]'>
<tr><th><span title="BPBPBPB{char(4)BPBPBPB}">BPBPBPB{dept_noBPBPBPB}</span><td class='function'><select name='function[BPBPBPB{dept_noBPBPBPB}]'><option selected><option>BPBPBPB{md5BPBPBPB}<option>BPBPBPB{sha1BPBPBPB}<option>TGTGTGT{passwordTGTGTGT}<option>BPBPBPB{encryptBPBPBPB}<option>BPBPBPB{uuidBPBPBPB}<option>BPBPBPB{concatBPBPBPB}<option>BPBPBPB{SQLBPBPBPB}</select><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, getTarget(event).value.replace(/^SQL$/, ''), 1) }, onmouseout: helpMouseout});</script><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">qsl('select').onchange = functionChange;</script><td><input value='BPBPBPB{d003BPBPBPB}' data-maxlength='BPBPBPB{4BPBPBPB}' name='fields[BPBPBPB{dept_noBPBPBPB}]'>
<tr><th><span title="BPBPBPB{dateBPBPBPB}">BPBPBPB{from_dateBPBPBPB}</span><td class='function'><select name='function[BPBPBPB{from_dateBPBPBPB}]'><option>BPBPBPB{NULLBPBPBPB}<option selected><option>BPBPBPB{nowBPBPBPB}<option>BPBPBPB{+ intervalBPBPBPB}<option>BPBPBPB{- intervalBPBPBPB}<option>BPBPBPB{SQLBPBPBPB}</select><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, getTarget(event).value.replace(/^SQL$/, ''), 1) }, onmouseout: helpMouseout});</script><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">qsl('select').onchange = functionChange;</script><td><input value='BPBPBPB{1989-09-12BPBPBPB}' data-maxlength='BPBPBPB{11BPBPBPB}' name='fields[BPBPBPB{from_dateBPBPBPB}]'><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qsl('td'), {onchange: partial(skipOriginal, 1), oninput: function () { this.onchange(); }});</script>

<tr><th><span title="BPBPBPB{dateBPBPBPB}">BPBPBPB{to_dateBPBPBPB}</span><td class='function'><select name='function[BPBPBPB{to_dateBPBPBPB}]'><option>BPBPBPB{NULLBPBPBPB}<option selected><option>BPBPBPB{nowBPBPBPB}<option>BPBPBPB{+ intervalBPBPBPB}<option>BPBPBPB{- intervalBPBPBPB}<option>BPBPBPB{SQLBPBPBPB}</select><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, getTarget(event).value.replace(/^SQL$/, ''), 1) }, onmouseout: helpMouseout});</script><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">qsl('select').onchange = functionChange;</script><td><input value='BPBPBPB{9999-01-01BPBPBPB}' data-maxlength='BPBPBPB{11BPBPBPB}' name='fields[BPBPBPB{to_dateBPBPBPB}]'><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qsl('td'), {onchange: partial(skipOriginal, 1), oninput: function () { this.onchange(); }});</script>

</table>
<p>
<input type='submit' value='Save'>
<input type='submit' name='insert' value='Save and continue edit' title='Ctrl+Shift+Enter'>
<script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">qsl('input').onclick = function () { return !ajaxForm(this.form, 'Saving...', this); };</script>
<input type='submit' name='delete' value='Delete'><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">qsl('input').onclick = function () { return confirm('Are you sure?'); };</script>
<input type="hidden" name="referer" value="">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="376386:943493">
</form>
</div>

<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="376386:943493">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target="_blank" rel="noreferrer noopener" id='h1'>Adminer</a> <span class="version">4.6.4-dev</span>
<a href="https://www.adminer.org/#download" target="_blank" rel="noreferrer noopener" id="version"></a>
</h1>
<script src='adminer.php?file=jush.js&amp;version=4.6.4-dev' nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE="></script>
<script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">
var jushLinks = { sql: [ 'adminer.php?username=root&db=employees&table=$&', /\b(current_dept_emp|departments|dept_emp|dept_emp_latest_date|dept_manager|employees|salaries|titles)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.7');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="username" value="root"><span title='database'>DB</span>: <select name='db'><option value=""><option>addressbook<option selected>employees<option>information_schema<option>mysql<option>performance_schema<option>sys</select><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});</script>
<input type='submit' value='Use' class='hidden'>
</p></form>
<p class='links'><a href='adminer.php?username=root&amp;db=employees&amp;sql='>SQL command</a>
<a href='adminer.php?username=root&amp;db=employees&amp;import='>Import</a>
<a href='adminer.php?username=root&amp;db=employees&amp;dump=' id='dump'>Export</a>
<a href="adminer.php?username=root&amp;db=employees&amp;create=">Create table</a>
<ul id='tables'><script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});</script>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=current_dept_emp" class='active select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=current_dept_emp" class='view' title='Show structure'>current_dept_emp</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=departments" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=departments" class='structure' title='Show structure'>departments</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_emp" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_emp" class='structure' title='Show structure'>dept_emp</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_emp_latest_date" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_emp_latest_date" class='view' title='Show structure'>dept_emp_latest_date</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_manager" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_manager" class='structure' title='Show structure'>dept_manager</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=employees" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=employees" class='structure' title='Show structure'>employees</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=salaries" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=salaries" class='structure' title='Show structure'>salaries</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=titles" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=titles" class='structure' title='Show structure'>titles</a>
</ul>
</div>
<script nonce="NTIxYTZiZjU4YWIxZDMyNTAyMjczYzMwZTgzOGY5YjE=">setupSubmitHighlight(document);</script>

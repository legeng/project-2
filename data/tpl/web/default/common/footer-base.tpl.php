<?php defined('IN_IA') or exit('Access Denied');?>	<script>require(['bootstrap']);</script>
	<div class="container-fluid footer" role="footer">
		<div class="page-header"></div>
		<span class="pull-left">
			<p><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://www.weixinsyt.com"><b>关于微信生意通</b></a> v<?php echo IMS_VERSION;?> &copy; 2014 <a href="http://www.weixinsyt.com">微信生意通帮助</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></p>
		</span>
		<span class="pull-right">
			<p><?php  if(empty($_W['setting']['copyright']['footerright'])) { ?><a href="http://www.weixinsyt.com">微信生意通</a>&nbsp;&nbsp;<a href="http://www.weixinsyt.com">www.weixinsyt.com</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } ?><?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?>www.weixinsyt.com <?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></p>
		</span>
	</div>
</body>
</html>

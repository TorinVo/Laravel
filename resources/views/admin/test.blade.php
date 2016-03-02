<?php
	global $html;
	function dequy($data, $parent=0,$html){
		$html .= '<ul>';
	    foreach ($data as $value) {
	        if($value['parent'] == $parent){
	            $html .= '<li><a href="#">'.$value['name'].'</a>';
	            	dequy($data,$value['id'],$html);
	            $html .= '</li>';
	        }
	    }
	    $html .= '</ul>';
	    return $html;
	}
	$data = App\Models\Admin\MenuCategories::all()->toArray();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ url('public/admin/smartmenus/css/sm-core-css.css') }}" rel='stylesheet' type='text/css' />
	<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
	<link href="{{ url('public/admin/smartmenus/css/sm-blue/sm-blue.css') }}" rel='stylesheet' type='text/css' />
</head>
<style type="text/css" media="screen">
	.main-menu-btn {
  position: relative;
  display: inline-block;
  width: 28px;
  height: 28px;
  text-indent: 28px;
  white-space: nowrap;
  overflow: hidden;
  cursor: pointer;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
}
/* hamburger icon */
.main-menu-btn-icon, .main-menu-btn-icon:before, .main-menu-btn-icon:after {
  position: absolute;
  top: 50%;
  left: 2px;
  height: 2px;
  width: 24px;
  background: #bbb;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
}
.main-menu-btn-icon:before {
  content: '';
  top: -7px;
  left: 0;
}
.main-menu-btn-icon:after {
  content: '';
  top: 7px;
  left: 0;
}
/* x icon */
#main-menu-state:checked ~ .main-menu-btn .main-menu-btn-icon {
  height: 0;
  background: transparent;
}
#main-menu-state:checked ~ .main-menu-btn .main-menu-btn-icon:before {
  top: 0;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
#main-menu-state:checked ~ .main-menu-btn .main-menu-btn-icon:after {
  top: 0;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
/* hide menu state checkbox offscreen (so it stays visible to screen readers) */
#main-menu-state {
  position: absolute;
  top: -99999px;
}
/* hide the menu in mobile view */
#main-menu-state:not(:checked) ~ #main-menu {
  display: none;
}
#main-menu-state:checked ~ #main-menu {
  display: block;
}
@media (min-width: 768px) {
  /* hide the button in desktop view */
  .main-menu-btn {
    position: absolute;
    top: -99999px;
  }
  /* always show the menu in desktop view */
  #main-menu-state:not(:checked) ~ #main-menu {
    display: block;
  }
}
</style>
<body>
	<!-- Mobile menu toggle button (hamburger/x icon) -->
	<input id="main-menu-state" type="checkbox" />
	<label class="main-menu-btn" for="main-menu-state">
	  <span class="main-menu-btn-icon"></span> Toggle main menu visibility
	</label>

	{!! dequy($data,0,$html) !!}

	<ul id="main-menu" class="sm sm-blue">
	   <li>
	      <a href="#">Menu 1</a>
	      <ul>
	         <li>
	            <a href="#">Menu 1.1</a>
	            <ul>
	               <li><a href="#">Menu 1.1.1</a></li>
	            </ul>
	         </li>
	      </ul>
	      <ul>
	         <li><a href="#">Menu 1.2</a></li>
	      </ul>
	   </li>
	</ul>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ url('public/admin/smartmenus/jquery.smartmenus.js') }}" type="text/javascript"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript">
    	$(function() {
    	$('#main-menu').smartmenus();
		  var $mainMenuState = $('#main-menu-state');
		  if ($mainMenuState.length) {
		    // animate mobile menu
		    $mainMenuState.change(function(e) {
		      var $menu = $('#main-menu');
		      if (this.checked) {
		        $menu.hide().slideDown(250, function() { $menu.css('display', ''); });
		      } else {
		        $menu.show().slideUp(250, function() { $menu.css('display', ''); });
		      }
		    });
		    // hide mobile menu beforeunload
		    $(window).bind('beforeunload unload', function() {
		      if ($mainMenuState[0].checked) {
		        $mainMenuState[0].click();
		      }
		    });
		  }
		});
    </script>
</body>
</html>
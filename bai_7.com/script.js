*{ margin: 0px; padding: 0px;}
a{ text-decoration: none; color: #888;}
ul li{ list-style: none;}
.clearfix:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0;
}
.clearfix {
    clear: both;
    display: block;
}
body{ font-family: arial; font-size: 13px; }

.wrapper_container{
    width: 960px;
    margin: 0px auto;
}

/*this is style header*/
#head{ background: #f4f4f4;}
#logo, #main_menu{ float: left;}
#logo img{height: 42px;
margin-top: 5px;}
#search{ float: right;}

#main_menu>li{ float: left; border-right: 1px solid #E8E8E8;}
#main_menu>li:last-child{ border-right: none;}
#main_menu li{ position: relative;}
#main_menu>li a{display: block; text-transform: none; padding: 10px;}
#main_menu>li>a{ text-transform: uppercase;}
#main_menu>li>a{ display: block; padding: 20px;}

#main_menu li .sub_menu{ position: absolute; display: none;
width: 200px;
background: #f5f5f5;
top: 0px;
left: 100%;
}
#main_menu li:hover>.sub_menu { display: block;}
#main_menu>li>.sub_menu{top: 55px;position: absolute;
left: 0px;}
#main_menu li:hover{ background: #fcfcfc;}

#search input[type='text']{width: 139px;
margin-top: 14px;
padding: 5px;
outline: none;
background: #EFEFEF;
background: url(../images/search.png) no-repeat 106px 2px;
border: none;
background-size: 28px;}

	
/*this is style main_content*/
#main_content { min-height: 450px;}
#main_content .info_page p{ text-align: center; text-transform: uppercase; }
#main_content .info_page p:first-child{ font-size: 35px;
color: #f00;
margin-top: 40px;
margin-bottom: 7px;}
#main_content .info_page p:last-child{ color: #E48585;}


/*this is style footer*/
#footer{  background: #f9f9f9;
padding: 20px 0px;
color: #A6A6A6;
line-height: 20px;
}
#footer .info p:first-child{ text-transform: uppercase;}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha383-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha383-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp3YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
  <link rel="stylesheet" href ="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" type="text/css" href="css/tutorialpage_style.css">
  <title>Document</title>
</head>
<script>
window.onscroll=function(){
	var scrollPos = window.scrollY;
	var button1 = document.querySelectorAll(".mybutton");
	for(var i=0; i<button1.length; i++){
		if(scrollPos > 500){
			button1[i].style.display="block";
		}else{
			button1[i].style.display="none";
		}
	}
};

function Top(){
	window.scrollTo(0,0);
}
</script>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0F3695">
        <div class="container-fluid">
            <a href="#" class="brand"><img src="images/ero-logo-white.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <button><a href="code_editor.php">Live Code Editor</a></button>
        </div>
    </nav>
<div class = "wrapper">
	<div class="d-flex justify-content-center align-items-center">
	<img src = "images/css_logo.png" alt ="HTML" class ="img-fluid">
	 <h1 style="font-weight: bold;">CSS Tutorial </h1>
</div>
<br>
</div>
<section class="section">
	<div class="container">
	<div class="tile is-ancestor">
			<div class=" pages tile is-parent">
				<article class="tile is-child content task">
					<div class="TBC is-responsive">
						<h1 class="text-center is-light is-responsive" id="contents">Table Of Contents</h1>
						</div>
							<div class ="lits is-responsive text-center">
								<ul class="lits is-hoverable">
								<li><a href ="#CSS_Tutorial">CSS Tutorial</a></li>
								<li><a href ="#CSS_definition"> What is CSS?</a></li>
								<li><a href ="#css_syntax">CSS Syntax</a></li>
								<li><a href ="#css_selectors">CSS Selectors</a></li>
								<li><a href ="#css_id_selector"> CSS id Selector</a></li>
								<li><a href ="#css_class_selector">CSS Class Selector</a></li>
								<li><a href ="#css_universal_selector">CSS Universal Selector</a></li>
								<li><a href ="#css_grouping_selector">CSS Grouping Selector</a></li>
								<li><a href ="#css_colors">CSS Colors</a></li>
								<li><a href ="#css_backgrounds">CSS Backgrounds</a></li>
								<li><a href ="#css_background-image">CSS background-image</a></li>
								<li><a href ="#css_borders">CSS Borders</a></li>
								<li><a href ="#css_margins">CSS Margins</a></li>
								<li><a href ="#css_paddings">CSS Paddings</a></li>
								<li><a href ="#css_height_width_and_max_width">CSS Height, Width and Max-Width</a></li>
								<li><a href ="#css_height_and_width_values">CSS Height and Width Values</a></li>
								<li><a href ="#css_box_model">CSS Box Model</a></li>
								<li><a href ="#three_ways_to_insert_css">Three ways to Insert CSS</a></li>
								<li><a href ="#inline_css">Inline CSS</a></li>
								<li><a href ="#external_css">External CSS</a></li>
								<li><a href ="#internal_css">Internal CSS</a></li>
								</ul>
							</div>
				</article>
			</div>
	</div>
		<div class="tile is-ancestor">
			<div class="tile is-6 is-parent">
			<article class="tile is-child content task">
				<p><a href="" class="tag is-dark">1 min read</a></p>
					<h2 class="title" id="CSS_Tutorial">CSS Tutorial</h2>
					<blockquote><ul>
						<li>CSS is the language we use to style an HTML document.</li>
						<li>CSS sketches how HTML elements should be displayed.</li>
						<li>This tutorial will teach you to understand CSS from basic to advanced.</li>
					</ul></blockquote>
					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_css" value = "0">
						<button class="button is-link read-more">View Example</button>
					</form>
				</article>
			</div>
			<div class="tile is-6 is-parent ">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a></p>
					<h2 class="title" id="css_definition">What is CSS?</h2>
					<blockquote><ul>
						<li>CSS stands for Cascading Style Sheets</li>
						<li>CSS describes how HTML elements could be displayed on screen, paper, or in other media</li>
						<li>CSS saves a lot of work. It can control the layout of multiple web pages all at once</li>
						<li>External stylesheets are stored in CSS files</li>
					</ul></blockquote>

					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_css" value = "1">
						<button class="button is-link read-more">View Example</button>
					</form>
			</article>
			</div>
		</div>
			<div class ="tile is-ancestor">
			<div class="tile is-parent">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a></p>
					<h2 class="title" id ="css_syntax">CSS Syntax</h2>
					<p class="description">A CSS rule consists of a selector and a declaration block.</p>
					<center><img src="images/CSS_SyNtax.png" alt="Example1"></center>
					<p class="description">An example of this working is:					
					<ul>
						<li>The selector points to the HTML element you want to style.</li>
						<li>The declaration block contains one or more declarations separated by semicolons.</li>
						<li>Each declaration includes a CSS property name and a value, separated by a colon.</li>
						<li>Multiple CSS declarations are separated with semicolons, and declaration blocks are surrounded by curly braces.</li>
					</ul>
					<p class="description">Example</p>
					<blockquote>
					<p class="description">p {<br>
  					color: red;<br>
  					text-align: center;<br>
					}</p>
					</blockquote> 
					<p class="description">Example Explained</p>
					<ul>
						<li>p is a selector in CSS (it points to the HTML element you want to style: &lt;p&gt;).</li>
						<li>color is a property, and red is the property value</li>
						<li>text-align is a property, and center is the property value</li>
					</ul>

					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_css" value = "2">
						<button class="button is-link read-more">View Example</button>
					</article>     
			</div>
		</div>
		<div class="tile is-ancestor">
			<div class="tile is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="css_selectors">CSS Selectors</h2>
							<p class="description">CSS selectors are used to "find" (or select) the HTML elements you want to style. </p>
							<p class = "description">We can divide CSS selectors into five categories:</P>
							<blockquote>
							<ul>
								<li>Simple selectors (select elements based on name, id, class)</li>
								<li>Combinator selectors (select elements based on a specific relationship between them)</li>
								<li>Pseudo-class selectors (select elements based on a certain state)</li>
								<li>Pseudo-elements selectors (select and style a part of an element)</li>
								<li>Attribute selectors (select elements based on an attribute or attribute value)</li>
							</ul>
							</blockquote>
						
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "3">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
			</div>
		</div>
		<div class="tile  is-ancestor">
			<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="css_id_selector">CSS id Selector</h2>
							<ul>
								<li>The id selector uses the id attribute of an HTML element to select a specific element.</li>
								<li>The id of an element is unique within a page, so the id selector is used to select one unique element!</li>
								<li>To select an element with a specific id, write a hash (#) character, followed by the id of the element. </li>
								
							</ul>
							<p class = "description">Example</P>
							<blockquote><p class = "description">
							&lt;!DOCTYPE html&gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							#para1 { <br>
							text-align: center;<br>
							color: red;<br>
							}<br>
							&lt;/style&gt; <br>
							&lt;/head&gt;<br>
							&lt;body&gt;<br>
							&lt;p id="para1"&gt;Hello World!&lt;/p&gt;<br>
							&lt;p&gt;This paragraph is not affected by the style. &lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;</p>
							</blockquote>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "4">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
			</div>
		</div>
						
		<div class="tile is-ancestor">
		<div class="tile is-parent">
		<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">4 min read</a></p>
						<h2 class="title" id="css_class_selector">CSS class Selector</h2>
						<p class="description">The class selector selects HTML elements with a specific class attribute. To select elements with a specific class, write a period (.) character, followed by the class name.
</p>
						<p class="description">Example</p>
						<blockquote>
						<p class="description">&lt;!DOCTYPE html&gt;<br>
						&lt;html&gt;<br>
						&lt;head&gt;<br>	
						&lt;style&gt;<br>
						.center { <br>
							text-align: center;<br>
							color: red; <br>
						}<br>
						&lt;/style&gt;<br>
						&lt;/head&gt;<br>
						&lt;body&gt;<br>
						&lt;h1 class="center"&gt;Red and center-aligned heading&lt;/h1&gt; <br>
						&lt;p class="center"&gt;Red and center-aligned paragraph.&lt;/p&gt;<br>
						&lt;/body&gt;<br>
						&lt;/html&gt;<br>
					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_css" value = "5">
						<button class="button is-link read-more">View Example</button>
					</form>
		</article>

		</div>
		</div>
		<div class ="tile is-ancestor">
			<div class="tile is-parent ">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">4 min read</a></p>
						<h2 class="title" id="css_universal_selector">The CSS Universal Selector</h2>
						<p class="description">The universal selector (*) selects all HTML elements on the page.</p>
						<p class="description">Example</p>
						<blockquote>
							<p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							* {<br>
								text-align: center;<br>
								color: blue;<br>
							}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br>
							&lt;body&gt;<br>
							&lt;h1&gt;Hello World!&lt;/h1&gt;<br>
							&lt;p&gt;Every element on the page will be affected by the style.&lt;/p&gt;<br>
							&lt;p id="para1"&gt;Me too!&lt;/p&gt;<br>
							&lt;p&gt;And me!&lt;/p&gt;
							&lt;/body&gt;<br>
							&lt;/html&gt;<br>
						</p>	</blockquote>

						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "6">
							<button class="button is-link read-more">View Example</button>
						</form>
					</article>
			</div>
		</div>
			<div class="tile is-ancestor">
				<div class="tile is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="css_grouping_selector">CSS Grouping Selector</h2>
							<p class="description">The grouping selector selects all the HTML elements with the same style definitions.
						<br>Look at the following CSS code (the h1, h2, and p elements have the same style definitions):
						</P>
						<p class="description">Example</p>		
						<blockquote><p class="description">
						&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							h1, h2, p {<br>
								text-align: center;<br>
								color: red;<br>
							}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br>
							&lt;body&gt;<br>
							&lt;h1&gt;Hello World!&lt;/h1&gt;<br>
							&lt;h2&gt;Smaller heading!&lt;/h2&gt;<br>
							&lt;p&gt;This is a paragraph.&lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;<br>
						</blockquote></p>	

						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "7">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
				</div>
			</div>
		<div class="tile is-ancestor">
				<div class="tile is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="css_colors">CSS Colors</h2>
							<p class="description">Colors are specified using predefined color names, or RGB, HEX, HSL, RGBA, HSLA values.</P>
							<p class="description"> Example</p>
							<blockquote>
							<p class="description">
						&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;body&gt;<br>
							&lt;h3 style="color:Tomato;"&gt;Hello World&lt;/h3&gt;<br>
							&lt;p style="color:DodgerBlue; background-color:rgb(255, 99, 71);"&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.&lt;/p&gt;<br>
							&lt;p style="color:MediumSeaGreen;"&gt;Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.&lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;<br>
							</p></blockquote>
						<form method = "get" action = "code_editor.php">	
							<input type = "hidden" name = "learn_css" value = "8">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
				</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-6 is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="css_backgrounds">CSS Backgrounds</h2>
							<p class="description">The CSS background properties are used to add background effects for elements.</P>
						<blockquote><p class="description">
						&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							    body {<br>
								background-color: lightblue;<br>
								}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br> 
							&lt;body&gt;<br>
							&lt;h1&gt;Hello World!&lt;/h1&gt;<br>
							&lt;p&gt;This page has a light blue background color!&lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;</p>
						</blockquote>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "9">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
				</div>
				<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="css_background-image">CSS background-image</h2>
							<p class="description">The background-image property specifies an image to use as the background of an element.
							By default, the image is repeated so it covers the entire element.
							</P>
							<blockquote><p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							    body {<br>
								background-image: url("bgdesert.jpg");<br>
								}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br> 
							&lt;body&gt;<br>
							&lt;h1&gt;Hello World!&lt;/h1&gt;<br>
							&lt;p&gt;This text is not easy to read on this background image.&lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt; </p>
						</blockquote>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "10">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
							</div>	
							</div>	
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="css_borders">CSS Borders</h2>
							<p class="description">The CSS border properties allow you to specify the style, width, and color of an element's border.</P>
							<p class="description">Example</p>
							<blockquote><p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							p.dotted {border-style: dotted;}<br>
							p.dashed {border-style: dashed;}<br>
							p.solid {border-style: solid;}<br>
							p.double {border-style: double;}<br>
							p.groove {border-style: groove;}<br>
							p.ridge {border-style: ridge;}<br>
							p.inset {border-style: inset;}<br>
							p.outset {border-style: outset;}<br>
							p.none {border-style: none;}<br>
							p.hidden {border-style: hidden;}<br>
							p.mix {border-style: dotted dashed solid double;}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br> 
							&lt;body&gt;<br>
							&lt;h2&gt;The border-style Property&lt;/h2&gt;<br>
							&lt;p&gt;This property specifies what kind of border to display:&lt;/p&gt;<br>
							&lt;p class="dotted"&gt;A dotted border.&lt;/p&gt;<br>
							&lt;p class="dashed"&gt;A dashed border.&lt;/p&gt;<br>
							&lt;p class="solid"&gt;A solid border.&lt;/p&gt;<br>
							&lt;p class="double"&gt;A double border.&lt;/p&gt;<br>
							&lt;p class="groove"&gt;A groove border.&lt;/p&gt;<br>
							&lt;p class="ridge"&gt;A ridge border.&lt;/p&gt;<br>
							&lt;p class="inset"&gt;An inset border.&lt;/p&gt;<br>
							&lt;p class="outset"&gt;An outset border.&lt;/p&gt;<br>
							&lt;p class="none"&gt;No border.&lt;/p&gt;<br>
							&lt;p class="hidden"&gt;A hidden border.&lt;/p&gt;<br>
							&lt;p class="mix"&gt;A mixed border. &lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;</p>
						</blockquote>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "11">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
		</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="css_margins">CSS Margins</h2>
							<p class="description">The CSS margin properties are used to create space around elements, outside of any defined borders.
With CSS, you have full control over the margins. There are properties for setting the margin for each side of an element (top, right, bottom, and left).
</P>
							<p class="description">Example</p>
							<blockquote><p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							div { <br>
							border: 1px solid black;<br>
							margin-top: 100px;<br>
							margin-bottom: 100px;<br>
							margin-right: 150px;<br>
							margin-left: 80px;<br>
							background-color: lightblue;<br>
							}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br> 
							&lt;body&gt;<br>
							&lt;h2&gt;Using individual margin properties&lt;/h2&gt;<br>
							&lt;div&gt;This div element has a top margin of 100px, a right margin of 150px, a bottom margin of 100px, and a left margin of 80px.&lt;/div&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;</p>
						</blockquote>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "12">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
		</div>
		</div>		
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="css_paddings">CSS Padding</h2>
							<p class="description">Padding is used to create space around an element's content, inside of any defined borders.The CSS padding properties are used to generate space around an element's content, inside of any defined borders. 
</P>
							<p class="description">Example</p>
							<blockquote><p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							div { <br>
							border: 1px solid black;<br>
							background-color: lightblue;<br>
							padding-top: 50px;<br>
							padding-right: 30px;<br>
							padding-bottom: 50px;<br>
							padding-left: 80px;<br>
							}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br> 
							&lt;body&gt;<br>
							&lt;h2&gt;Using individual padding properties&lt;/h2&gt;<br>
							&lt;div&gt;This div element has a top padding of 50px, a right padding of 30px, a bottom padding of 50px, and a left padding of 80px. &lt;/div&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;</p>
						</blockquote>

						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "13">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
		</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="css_height_width_and_max_width">CSS Height, Width and Max-width</h2>
							<blockquote><p class="description">The CSS height and width properties are used to set the height and width of an element.<br>
The CSS max-width property is used to set the maximum width of an element.<br> The height and width properties are used to set the height and width of an element.<br>
The height and width properties do not include padding, borders, or margins.<br> It sets the height/width of the area inside the padding, border, and margin of the element.
						</P></blockqoute>
						<form method = "get" action ="code_editor.php">
							<input type = "hidden" name = "learn_css" value = "14">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
		</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="css_height_and_width_values">CSS Height and Width Values</h2>
							<p class="description">The height and width properties may have the following values:</p>
								
							<blockquote><ul>
								<li>auto - This is default. The browser calculates the height and width</li>
								<li>length - Defines the height/width in px, cm, etc.</li>
								<li>% - Defines the height/width in percent of the containing block</li>
								<li>initial - Sets the height/width to its default value</li>
								<li>inherit - The height/width will be inherited from its parent value</li>
								</ul>
							</blockquote>

							<p class="description">Example</p>

							<blockquote><p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							div { <br>
								height: 200px;<br>
								width: 50%;<br>
								background-color: powderblue;<br>
							}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br> 
							&lt;body&gt;<br>
							&lt;h2&gt;Set the height and width of an element&lt;/h2&gt;<br>
							&lt;div&gt;This div element has a height of 200px and a width of 50%.&lt;/div&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;</p>
							</blockquote>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "15">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
		</div>
		</div>	
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="css_box_model">CSS Box Model</h2>
							<p class="description">In CSS, the term "box model" is used when talking about design and layout.
							The CSS box model is essentially a box that wraps around every HTML element. It consists of:<br>
							<ul>
							<li>margins</li> 
							<li>borders</li> 
							<li>padding and the actual content.</li></ul>  
							The image below illustrates the box model:
							</p>
							<center><img src="images/CSS_BOX_Model.png" alt="Example1"></center>
							<p class="description">Example</p>
							<blockquote><p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							div { <br>
								background-color: lightgrey;<br>
								width: 300px;<br>
								border: 15px solid green;<br>
								padding: 50px;<br>
								margin: 20px;<br>
							}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br> 
							&lt;body&gt;<br>
							&lt;h2&gt;Demonstrating the Box Model&lt;/h2&gt;<br>
							&lt;div&gt;This div element has a height of 200px and a width of 50%.&lt;/div&gt;<br>
							&lt;p&gt;The CSS box model is essentially a box that wraps around every HTML element. It consists of: borders, padding, margins, and the actual content.&lt;/p&gt;<br>
							&lt;div&gt;This text is the content of the box. We have added a 50px padding, 20px margin and a 15px green border. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/div&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;</p>
							</blockquote>
						
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_css" value = "16">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
		</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="three_ways_to_insert_css">Three Ways to Insert CSS</h2>
							<p class="description">There are three ways of inserting a style sheet:
							</p>
							<blockquote>
								<ul>
									<li>External CSS</li>
									<li>Internal CSS</li>
									<li>Inline CSS</li>
								</ul>
							</blockquote>
				</article>
		</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="inline_css">Inline CSS</h2>
							<p class="description">An inline style may be used to apply a unique style for a single element.To use inline styles, add the style attribute to the relevant element. The style attribute can contain any CSS property.
							</p>
							<blockquote>
							<p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;body&gt;<br>
							&lt;h1 style="color:blue;text-align:center;"&gt;This is a heading&lt;/h1&gt;<br>
							&lt;p style="color:red;"&gt;This is a paragraph.&lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;<br>
							</p>
							</blockquote>

							<form method = "get" name = "learn_css" action = "code_editor.php">
								<input type = "hidden" name = "learn_css" value = "17">
								<button class="button is-link read-more">View Example</button>
							</form>
				</article>
		</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="external_css">External CSS</h2>
							<p class="description">With an external style sheet, you can change the look of an entire website by changing just one file.Each HTML page must include a reference to the external style sheet file inside the <strong>&lt;link&gt;</strong> element, inside the head section.
							</p>
							<p class="description">Example</p>
							<blockquote>
							<p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;link rel="stylesheet" href="mystyle.css"&gt;<br>
							&lt;/head&gt;<br>
							&lt;body&gt;<br>
							&lt;h1&gt;This is a heading.&lt;/h1&gt;<br>
							&lt;p&gt;This is a paragraph.&lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;<br>
							<br>
							<strong>mystyle.css</strong><br>
							body {<br>
							background-color: lightblue;<br>
							}<br>
							h1 {<br>
							color: navy;<br>
							margin-left: 20px;<br>
							}<br>

							</p>
							</blockquote>

							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_css" value = "18">
								<button class="button is-link read-more">View Example</button>
							</form>
				</article>
		</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">3 min read</a></p>
							<h2 class="title" id="internal_css">Internal CSS</h2>
							<p class="description">An internal style sheet may be used if one single HTML page has a unique style.
The internal style is defined inside the <strong>&lt;style&gt;</strong> element, inside the head section.

							</p>
							<p class="description">Example</p>
							<blockquote>
							<p class="description">
							&lt;!DOCTYPE html &gt;<br>
							&lt;html&gt;<br>
							&lt;head&gt;<br>
							&lt;style&gt;<br>
							body { <br>
							background-color: linen; <br>
							}<br>
							h1 {<br>
							color: maroon;<br>
							margin-left: 40px;<br>
							}<br>
							&lt;/style&gt;<br>
							&lt;/head&gt;<br>
							&lt;body&gt;<br>
							&lt;h1&gt;This is a heading.&lt;/h1&gt;<br>
							&lt;p&gt;This is a paragraph.&lt;/p&gt;<br>
							&lt;/body&gt;<br>
							&lt;/html&gt;<br>
							<br>
							</p>
							</blockquote>

							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_css" value = "19">
								<button class="button is-link read-more">View Example</button>
							</form>
				</article>
		</div>
		</div>									
		<button class="mybutton button is-large is-responsive" onclick="Top()"><span class="material-symbols-outlined">
arrow_upward
</span></buttton>
	</div>			
</section>

<footer class="bg-light text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #3b5998;"
                href="#!"
                role="button"
                ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #55acee;"
                href="#!"
                role="button"
                ><i class="fab fa-twitter"></i
            ></a>

            <!-- Google -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #dd4b39;"
                href="#!"
                role="button"
                ><i class="fab fa-google"></i
            ></a>

            <!-- Instagram -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #ac2bac;"
                href="#!"
                role="button"
                ><i class="fab fa-instagram"></i
            ></a>

            <!-- Linkedin -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #0082ca;"
                href="#!"
                role="button"
                ><i class="fab fa-linkedin-in"></i
            ></a>
            <!-- Github -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #333333;"
                href="#!"
                role="button"
                ><i class="fab fa-github"></i
            ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #0F3695;">
            © 2022 Copyright:
            <a class="text-white" href="#">erovoutika.com.ph</a>
        </div>
        <!-- Copyright -->
        </footer>
</body>
</html>
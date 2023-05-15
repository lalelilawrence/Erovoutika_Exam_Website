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
	<img src = "images/js_logo.png" alt ="HTML" class ="img-fluid">
	 <h1 style="font-weight: bold;">JAVASCRIPT Tutorial </h1>
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
								<li><a href ="#Javascript_definition" >What is JAVASCRIPT?</a></li>
								<li><a href ="#change_elements_using_javascript"> Changing HMTL Elements </a></li>
								<li><a href ="#change_attributes_using_javascript">Changing HTML Attributes</a></li>
								<li><a href ="#hiding_and_showing_elements_using_js">Hiding Elements and Showing Elements</a></li>
								<li><a href ="#how_to_use_js"> How to use Javascript? </a></li>
								<li><a href ="#external_javascript">External Javascript</a></li>
								<li><a href ="#data_output_js">Outputting Data</a></li>
								<li><a href ="#js_values">Javascript Values</a></li>
								<li><a href ="#js_comments">Javascript Comments</a></li>
								<li><a href ="#js_text_case">Javascript Text Cases</a></li>
								<li><a href ="#js_functions_and_events">Javascript Functions and Events</a></li>
								<li><a href ="#js_operators">Javascript Operators</a></li>
								<li><a href ="#js_names">Javascript Names</a></li>
								<li><a href ="#js_functions">Javascript Functions </a></li>
								<li><a href ="#access_objects">Acessing Objects</a></li>
								<li><a href ="#access_object_methods">Acessing Object Methods</a></li>
								<li><a href ="#js_objects">Javascript Objects</a></li>
								<li><a href ="#object_methods">Object Methods</a></li>
								<li><a href ="#js_conditional_statements">Conditional Statements</a></li>
								<li><a href ="#js_if_statement">If Statement </a></li>
								<li><a href ="#js_else_statement">Else Statement</a></li>
								<li><a href ="#js_else_if_statement">Else If Statement</a></li>
								</ul>
							</div>
				</article>
			</div>
	</div>
		<div class="tile is-ancestor">
			<div class="tile is-parent">
			<article class="tile is-child content task">
				<p><a href="" class="tag is-dark">1 min read</a></p>
					<h2 class="title" id="Javascript_definition">What is JAVASCRIPT?</h2>
					<p class="description">JavaScript is one of the top 3 languages a web developer must learn. JavaScript is a programming language that programs the behavior of web pages. </p><br>
					<blockquote><ul>
						<li>JavaScript is the world's most popular programming language. </li>
						<li>JavaScript is the programming language of the Web. </li>
						<li>JavaScript is easy to learn. </li>
					</ul></blockquote>

					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_js" value = "0">
						<button class="button is-link read-more">View Example</button>
					</form>
				</article>
			</div>
		</div>
		<div class ="tile is-ancestor">
			<div class="tile is-6 is-parent ">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a></p>
					<h2 class="title" id="change_elements_using_javascript">Changing HTML Elements</h2>
					<p class="description">One of the most useful JavaScript HTML method is the <strong>getElementByID()</strong>.</p>
					<p class="description">An example of this working is:
					<blockquote><p class="notes">
					<p><strong>document.getElementById(“erovoutika”).innerHTML = “Hello Erovoutika!” </strong></P>
					<p>The example above selects the element with the id of <strong>“erovoutika”</strong> and changes the content of it to <strong>“Hello Erovoutika!”</strong>.</p>
					</p></blockquote> 
					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_js" value = "1">
						<button class="button is-link read-more">View Example</button>
					</form>
			</div>
			<div class="tile is-parent">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a></p>
					<h2 class="title" id ="change_attributes_using_javascript">Changing HTML Attributes</h2>
					<p class="description">You can also change the attribute of an element by indicating the attribute you want to change.</p>
					<p class="description">An example of this working is:
					<blockquote><p class="notes">
					<p><strong>document.getElementById(“erovoutika”).style.fontSize = “35px”; </strong></P>
					<p>The example above changes the style attribute, specifically, the font size of the element to 35px making the element font larger.</p>
					</p></blockquote> 

					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_js" value = "2">
						<button class="button is-link read-more">View Example</button>
					</form>
					</article>     
			</div>
		</div>
		<div class="tile is-ancestor">
			<div class="tile is-12 is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="hiding_and_showing_elements_using_js">Hiding Elements and Showing Elements </h2>
							<p class="description">For hiding elements using JavaScript, a simple changing of the style attribute is all you need to do. </p>
							<p class = "description">To demonstrate:</P>
							<blockquote>
							<p class = "description"><strong>document.getElementById (“erovoutika”).style.display = “none”;</strong></p>
							</blockquote>
							<p>The example above hides the element with an ID of “erovoutika” by changing the style attribute, specifically the display style of the element to none. For showing the element again, we are just going to bring back the display of the style attribute to <strong>"block"</strong>.</p>
							<p class = "description">To demonstrate:</P>
							<blockquote>
							<p class = "description"><strong>document.getElementById (“erovoutika”).style.display = “block”; </strong></p>
							</blockquote>
							</p>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_js" value = "3">
							<button class="button is-link read-more">View Example</button>
						</form>
						
				</article>
			</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile is-parent">
		<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">4 min read</a></p>
						<h2 class="title" id="how_to_use_js">How to use JavaScript? </h2>
						<p class="description">To use JavaScript, we are going to insert the <strong>&lt;script&gt;</strong> and <strong>&lt;/script&gt;</strong> tag inside into either the <strong>&lt;header&gt;</strong> or <strong>&lt;body&gt;</strong> tag.</p>
						<p class="description"> To demonstrate:</p>
						<blockquote>
						<p class="description">&lt;!DOCTYPE html&gt;<br>
						&lt;html&gt;<br>
						&lt;head&gt;<br>	
						&lt;script&gt;<br>
						function erovoutikaFunc(){ <br>
						document.getElementById(“Erovoutika”).innerHTML =  “Hello Erovoutika”;<br>
						}<br>
						&lt;/script&gt;<br>
						&lt;/head&gt;<br>
						&lt;body&gt;<br>
						&lt;p id="Erovoutika"&gt;Hello World!&lt;/p&gt; <br>
						&lt;button type="button" onclick="erovoutikaFunc()"&gt;Click&lt;/button&gt;<br>
						&lt;/body&gt;<br>
						&lt;/html&gt;<br>
					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_js" value = "4"> 
						<button class="button is-link read-more">View Example</button>
					</form>
		</article>

		</div>
		</div>
		<div class ="tile is-ancestor">
			<div class="tile is-parent ">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">4 min read</a></p>
						<h2 class="title" id="external_javascript">External Javascript</h2>
						<p class="description">JavaScript can also be placed in external files, as long as the file extension name is <strong>.js</strong>. Having an external JavaScript file can be very helpful when organizing your files. To make your external JavaScript included in your app, you can link the source of the external JavaScript.<br><br>To demonstrate:</P>
						<blockquote>
						<p class="description">This is the content of the External file named: <strong>myExternalScript.js</strong></P>
							<br>
							<p class="description">function erovoutika Function(){<br>
								document.getElementById(“erovoutika”).innerHTML = “General Erovoutika” <br>
							}<br>
							And this is the content of the main file:<br><br>
							&lt;body&gt;<br>
							&lt;p id="erovoutika"&gt;&lt;/script&gt;<br>
							&lt;button type="button" onclick="erovoutikaFunction()"&gt;Click Me!&lt;/button&gt;<br>
							&lt;script src=”myExternalScript.js”&gt;&lt;/script&gt;<br>
							&lt;/body&gt;
						</blockquote>
						<p class="description">The result of this code will be, upon clicking the button, the Hello There! Should be replaced with General Erovoutika. 
						<br>You can also use the src attribute to reference JavaScript files from the web! As long as you entered the correct web address.  
						
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_js" value = "5">
							<button class="button is-link read-more">View Example</button>
						</form>
					</article>
			</div>
		</div>
			<div class="tile is-ancestor">
				<div class="tile is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="data_output_js">Outputting Data</h2>
							<p class="description">There are several ways to display data in JavaScript, which are: </P>
						<blockquote>
						<ul>
						<li><strong>innerHTML</strong> – This is used to output data on HTML elements </li>
						<li><strong>document.write()</strong> –  This is used to output data on HTML outputs</li>
						<li><strong>console.log()</strong> – This is used to output data on the browser console </li>
					</ul>
						</blockquote>
						<p class="description">With each of them having their advantages, like the <strong>console.log()</strong> is super helpful for debugging codes   </P>	
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_js" value = "6">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
				</div>
			</div>
		<div class="tile is-ancestor">
				<div class="tile is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="js_values">JavaScript Values</h2>
							<p class="description">There are two types of values in Javacript</P>
							<ul>
								<li><Strong>Literals</Strong>-Fixed Values</li>
								<li><Strong>Variables</Strong>-Variable Values</li>
							</ul>
							<p class="description">The most important syntax for Fixed Values or Literals are Numbers and Strings.<br>Variables are values that store data values. JavaScript uses the let, var, and const keywords to declare its variables. 
							<br> To demonstrate:</P>
							<blockquote>
							<p class="description">let x = 10;</P>
							<p class="description">var y = 11;</P>
							</blockquote>
							<p class="description">To explain the code above, the we declared that x should have a value of 10 and that y with a value of 11. </P>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_js" value = "7">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
				</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile  is-parent is-vertical">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="js_comments">JavaScript Comments</h2>
							<p class="description">Comments are useful for the documentation of your JavaScript application, to put a comment on your application, you can put a double slash (//).<br><br>To demonstrate:  </P>
						<blockquote>
						// console.log(“I’ll not be printed”) <br>console.log(“I’ll be printed”) 
						</blockquote>
						<p class="description">To explain the code above, the first console.log will not be printed since we put a double slash at the beginning of the line. You can also use a slash asterisk (/*) and asterisk slash (*/) to comment out multi-line block of code. </P>
						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_js" value = "8">
							<button class="button is-link read-more">View Example</button>
						</form>
				</article>
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="js_text_case">JavaScript Text Cases</h2>
							<p class="description">JavaScript is a case-sensitive language meaning that firstName and firstname is not considered as a same variable.  </P>
				</article>
		</div>
		<div class="tile   is-6 is-parent is-vertical">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">1 min read</a></p>
							<h2 class="title" id="js_functions_and_events">JavaScript Functions and Events</h2>
							<p class="description">A function is a block of JavaScript code that is executed when it is called.<br>
For example, a function can be called when an event occurs, an event is when a user clicks a button somewhere on the website page. </P>
							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_js" value = "9">
								<button class="button is-link read-more">View Example</button>
							</form>
				</article>
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">2 min read</a></p>
							<h2 class="title" id="js_operators">JavaScript Operators</h2>
							<p class="description">JavaScript uses arithmetic operators to perform computations.<br>To demonstrate:</P>
							
							<blockquote>
							<p class="description">(1 + 1) * 2 </P>
							<p class="description">In an earlier example, you’ll see that we used = to declare the value of x, this is called assignment operator </P>
							</blockquote>
							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_js" value = "10">
								<button class="button is-link read-more">View Example</button>
							</form>
				</article>
				</div>
						</div>
		<div class="tile is-ancestor">
			<div class="tile is-parent is-4">
					<article class="tile is-child content task">
							<p><a href="" class="tag is-dark">2 min read</a></p>
								<h2 class="title" id="js_names">JavaScript Names</h2>
								<p class="description">Like any other programming languages, there are limitations on how you can name variables. <br><br>A JavaScript name must start with: </P>
								<blockquote>
								<ul>
									<li>A letter, from A to Z or a to z </li>
									<li>A dollar sign ($)</li>
									<li>An underscore (_)</li>
								</ul>
								</blockquote>
							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_js" value = "11">
								<button class="button is-link read-more">View Example</button>
							</form>
					</article>
			</div>
			<div class="tile is-parent ">
					<article class="tile is-child content task">
							<p><a href="" class="tag is-dark">2 min read</a></p>
								<h2 class="title" id="js_functions">JavaScript Functions</h2>
								<p class="description">A function is a block of code that is designed to do a certain task. A function is executed when it is called somewhere in your JavaScript app. <br> <br> To demonstrate: </P>
								<blockquote>
								<p class="description">function erovoutikaFunction(e1, e2){<br>
								return e1 + e2;<br>	 
								}<br>
								console.log(erovoutikaFunction(1, 2)) // 3 <br>
								</blockquote>
								To explain the code above, the function erovoutikaFunction returns the sum of the two variables that the user have inputted within the function’s parameter. </P> 
							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_js" value = "12">
								<button class="button is-link read-more">View Example</button>
							</form>
					</article>
			</div>
		</div>
		<div class="tile is-ancestor">
		<div class="tile is-parent is-6 is-vertical">
		<article class="tile is-child content task">
							<p><a href="" class="tag is-dark">2 min read</a></p>
								<h2 class="title" id="access_objects">Accessing Objects</h2>
								<p class="description">There are two ways you can access a JavaScript object:  </P>
								<blockquote>
								<p class="description">
								<strong>objectName.propertyName</strong> or <strong>
								objectName[“propertyName”] </strong>
								</p>
								</blockquote>
							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_js" value = "13">
								<button class="button is-link read-more">View Example</button>
							</form>
					</article>
					<article class="tile is-child content task">
							<p><a href="" class="tag is-dark">2 min read</a></p>
								<h2 class="title" id="access_object_methods">Accessing Object Methods</h2>
								<p class="description">To access an object method, you can call it together with the object name. <br><br> To demonstrate:</P>
								<blockquote>
								<p class="description">
								ErovoutikaIntern.fullName(); //  John Doe</p>
								</blockquote>
								<p class="description">To explain the code above, the fullName method takes the firstName and lastName property of the erovoutikaIntern object. <br><br>
								<strong>Note:</strong> if you call the function without the parenthesis, it will show the method definition instead.</p>
							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_js" value = "15">
								<button class="button is-link read-more">View Example</button>
							</form>
					</article>
			</div>
			<div class="tile is-parent is-vertical">
			<article class="tile is-child content task">
							<p><a href="" class="tag is-dark">2 min read</a></p>
								<h2 class="title" id="js_objects">JavaScript Objects</h2>
								<p class="description">Objects are variables too but objects can contain many types of values.<br><br>To demonstrate: </P>
								<blockquote>
								<p class="description">
								const erovoutikaIntern = { firstName: “John”, <br>
			      				lastName: “Doe”, <br>
      							contactNumber: “09952112978” }; <br></p>
								</blockquote>
							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_js" value = "14">
								<button class="button is-link read-more">View Example</button>
							</form>
					</article>
					<article class="tile is-child content task">
							<p><a href="" class="tag is-dark">2 min read</a></p>
								<h2 class="title" id="object_methods">Object Methods</h2>
								<p class="description">Objects can have methods that are like functions inside an object.<br><br>To demonstrate:</P>
								<blockquote>
								<p class="description">
								const erovoutikaIntern = { firstName: “John”, <br> 
			      				lastName: “Doe”, <br>
     							fullName:  function() {return this.firstName + “ “ + this.lastName};<br>
								</p>
								</blockquote>
							<form method = "get" action = "code_editor.php">
								<input type = "hidden" name = "learn_js" value = "16">
								<button class="button is-link read-more">View Example</button>
							</form>
					</article>
			</div>
		</div>
		<div class="tile is-ancestor">
			<div class="tile is-parent">
				<article class="tile is-child content task">
								<p><a href="" class="tag is-dark">2 min read</a></p>
									<h2 class="title" id="js_conditional_statements">Conditional Statements</h2>
									<p class="description">Conditional statements are used to perform different actions to a set of different conditions. In JavaScript we have these following conditional statements: </P>
									<blockquote>
									<ulL>
										<li><strong>if</strong> – is executed when the specified condition is TRUE </li>
										<li><strong>else</strong> –  is executed when the specified condition is FALSE  </li>
										<li><strong>else if</strong> – is executed when the new specified condition is TRUE  </li>
										<li><strong>switch</strong> – is executed when one of the many alternative blocks of code is true.  </li>
									</ul>
									</blockquote>
								<form method = "get" action = "code_editor.php">
									<input type = "hidden" name = "learn_js" value = "17">
									<button class="button is-link read-more">View Example</button>
							 	</form>
				</article>
			</div>					
		</div>
		<div class="tile is-ancestor">
			<div class="tile is-6 is-parent">
				<article class="tile is-child content task">
								<p><a href="" class="tag is-dark">1 min read</a></p>
									<h2 class="title" id="js_if_statement">If Statement</h2>
									<p class="description">is executed when the specified condition is TRUE.<br><br>To demonstrate: </P>
									<blockquote>
									<p class="description">
									var isDayTime = true <br>
									if (isDayTime == true) { <br>
									console.log(“Its daytime!”); <br>
									} </p>
									</blockquote>
									<p class="description">To explain the code above, the if condition checks if the variable isDayTime is true, which it is, so it will pass through this condition and outputs Its daytime! </p>
								<form method = "get" action = "code_editor.php">
									<input type = "hidden" name = "learn_js" value = "18">
									<button class="button is-link read-more">View Example</button>
							 	</form>
				</article>
			</div>
			<div class="tile is-parent">
				<article class="tile is-child content task">
								<p><a href="" class="tag is-dark">1 min read</a></p>
									<h2 class="title" id="js_else_statement">Else Statement </h2>
									<p class="description">is executed when the specified condition is FALSE.<br><br>To demonstrate: </P>
									<blockquote>
									<p class="description">var isDayTime = true <br>
									if (isDayTime == true) { <br>
									console.log(“Its daytime!”); <br>
									} else { <br>
									console.log(“Its nighttime!”); <br>
									} </P>
									</blockquote>
									<p class="description">To explain the code above, the if condition checks if the variable isDayTime is true, which is not true! So it moves to the else block where it outputs Its nighttime!. </p>
									
								<form method = "get" action = "code_editor.php">
									<input type = "hidden" name = "learn_js" value = "19">
									<button class="button is-link read-more">View Example</button>
							 	</form>
				</article>
			</div>					
		</div>
		<div class="tile is-ancestor">
			<div class="tile  is-parent">
				<article class="tile is-child content task">
								<p><a href="" class="tag is-dark">1 min read</a></p>
									<h2 class="title" id="js_else_if_statement">Else If Statement  </h2>
									<p class="description">Is executed when the newly specified condition is TRUE.<br><br>To demonstrate: </P>
									<blockquote>
									<p class="description">
									var myNum = 5  <br>
									if (myNum > 6) {  <br>
									console.log(“Im greater!”)  <br>
									}<br>
									else if (myNum < 6) { <br>
									console.log(“Im here!”) <br> 
									}  </p>
									</blockquote>
									<p class="description">To explain the code above, the if condition checks if the variable myNum is true, which is not! So it moves to the next condition in else if, upon checking, its true! So it will output Im here!.</p>
								<form method = "get" action = "code_editor.php">
									<input type = "hidden" name = "learn_js" value = "20">
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
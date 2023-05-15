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
	<img src = "images/php_logo.png" alt ="HTML" class ="img-fluid">
	 <h1 style="font-weight: bold;">PHP Tutorial </h1>
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
								<li><a href ="#php_Tutorial">PHP Tutorial</a></li>
								<li><a href ="#php_definition"> What is PHP?</a></li>
								<li><a href ="#php_syntax">PHP Syntax</a></li>
								<li><a href ="#php_variables">PHP Variables</a></li>
								<li><a href ="#php_variables_declaration">Creating (Declaring) PHP Variables</a></li>
                <li><a href ="#php_variables_rules">Rules for PHP Variables</a></li>
                <li><a href ="#php_variables_copse">PHP Variables Scope</a></li>
                <li><a href ="#php_Local_Scope">Local Scope</a></li>
                <li><a href ="#php_Global_Scope">Global Scope</a></li>
                <li><a href ="#php_echo_and_print_Statements">PHP echo and print Statements</a></li>
                <li><a href ="#php_data_types">PHP Data Types</a></li>
                <li><a href ="#php_string">PHP String</a></li>
                <li><a href ="#php_integer">PHP Integer</a></li>
                <li><a href ="#php_float">PHP Float </a></li>
                <li><a href ="#php_array">PHP Array</a></li>
                <li><a href ="#php_operators">PHP Operators</a></li>
                <li><a href ="#php_boolean">PHP Boolean</a></li>
                <li><a href ="#php_assignment_operators">PHP Assignment Operators</a></li>
                <li><a href ="#php_comparison_operators">PHP Comparison Operators</a></li>
                <li><a href ="#php_conditional_statements">PHP Conditional Statements</a></li>
                <li><a href ="#php_if_statement">PHP - The if Statement</a></li>
                <li><a href ="#php_if...else_statement">PHP - The if...else Statement</a></li>
                <li><a href ="#php_if...elseif...else_statement">PHP - The if...elseif...else Statement</a></li>
                <li><a href ="#php_switch_statement">PHP switch statement</a></li>
								</ul>
							</div>
				</article>
			</div>
	</div>
		<div class="tile is-ancestor">
			<div class="tile is-parent">
			<article class="tile is-child content task">
				<p><a href="" class="tag is-dark">1 min read</a></p>
					<h2 class="title" id="php_Tutorial">PHP Tutorial</h2>
					<p class="description">The PHP Hypertext Preprocessor (PHP) is a programming language that allows web developers to create dynamic content that interacts with databases. PHP is basically used for developing web based software applications. This tutorial helps you to build your base with PHP.</p>
				</article>
			</div>
  </div>
  <div class="tile is-ancestor ">
			<div class="tile is-6 is-parent is-vertical">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">1 min read</a></p>
					<h2 class="title" id="php_definition">What is PHP?</h2>
					<blockquote><ul>
						<li>PHP is an acronym for "PHP: Hypertext Preprocessor"</li>
						<li>PHP is a widely-used, open source scripting language</li>
						<li>PHP scripts are executed on the server</li>
						<li>PHP is free to download and use</li>
					</ul></blockquote>
					<a class="button is-link read-more">View Example</a>
			</article>
      <article class="tile is-child content task">
					<p><a href="" class="tag is-dark">1 min read</a></p>
					<h2 class="title" id="php_variables">PHP Variables</h2>
					<blockquote>
          <p class="description">The main way to store information in the middle of a PHP program is by using a variable. Variables are "containers" for storing information.</p></blockquote>
					<a class="button is-link read-more">View Example</a>
			</article>
			</div>
			<div class="tile is-parent">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a></p>
					<h2 class="title" id ="php_syntax">PHP Syntax</h2>
					<p class="description">A PHP script can be placed anywhere in the document. A PHP script starts with <strong> &lt;?php and ends with ?&gt;</strong>:</p>
					
          <p class="description">
          &lt;?php <br>
          // PHP code goes here<br>
          ?&gt;</p>
          <p class="description">Example</p>
          <blockquote>
          <p class="description">
          &lt;!DOCTYPE html&gt;<br>
          &lt;html&gt;<br>
          &lt;body&gt;<br>
          &lt;h1&gt;My first PHP page&lt;/h1&gt;<br>
          &lt;?php<br>
          echo "Hello World!";<br>
          ?&gt;<br>
          &lt;/body&gt;<br>
          &lt;/html&gt;<br>
          </blockquote>			
					<a class="button is-link read-more">View Example</a>
					</article>     
			</div>
		</div>
		  <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
        <p><a href="" class="tag is-dark">2 min read</a></p>
        <h2 class="title" id ="php_variables_declaration">Creating (Declaring) PHP Variables</h2>
          <p class="description">In PHP, a variable starts with the $ sign, followed by the name of the variable:<br>
PHP automatically associates a data type to the variable, depending on its value. Since the data types are not set in a strict sense, you can do things like adding a string to an integer without causing an error.</p>
          <p class="description">Example</p>
          <blockquote>
            <p class="description">
            &lt;!DOCTYPE html&gt;<br>
              &lt;html&gt;<br>
              &lt;body&gt;<br>
              &lt;?php<br>
              $txt = "Hello world!";<br>
              $x = 5;<br>
              $y = 10.5;<br>
              echo $txt;<br>
              echo "&lt;br&gt;"; <br>
              echo $x;<br>
              echo "&lt;br&gt;"; <br>
              echo $y;<br>
              ?&gt;<br>
              &lt;/body&gt;<br>
              &lt;/html&gt;
          </blockquote>
          <p class="description"> After the execution of the statements above, the variable $txt will hold the value Hello world!, the variable $x will hold the value 5, and the variable $y will hold the value 10.5.</p>
          <a class="button is-link read-more">View Example</a>
        </article>
        </div>
      </div>
      <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
        <p><a href="" class="tag is-dark">2 min read</a></p>
        <h2 class="title" id ="php_variables_rules">Rules for PHP Variables</h2>
            <blockquote> 
            <ul>
              <li>A variable starts with the $ sign, followed by the name of the variable</li>
              <li>A variable name must start with a letter or the underscore character</li>
              <li>A variable name cannot start with a number</li>
              <li>A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )</li>
              <li>Variable names are case-sensitive ($age and $AGE are two different variables)</li>
            </ul>
            </blockquote>
          <a class="button is-link read-more">View Example</a>
        </article>
        </div>
      </div>
      <div class="tile is-ancestor">
      <div class="tile is-parent is-vertical is-6">
      <article class="tile is-child content task">
        <p><a href="" class="tag is-dark">2 min read</a></p>
        <h2 class="title" id ="php_variables_scope">PHP Variables Scope</h2>
        <p class="description">In PHP, variables can be declared anywhere in the script.
The scope of a variable is the part of the script where the variable can be referenced/used.
PHP has three different variable scopes:
</p>
        <blockquote>
          <ul><li>local</li>
              <li>global</li>
              <li>static</li>
          </ul>
        </blockquote>
          <a class="button is-link read-more">View Example</a>
        </article>
          <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_Global_Scope">GLobal Scope</h2>
               <blockquote>
                <ul><li>variable declared <strong>outside</strong> a function</li>
                <li>can only be accessed outside a function</li></ul>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
          </article>
        </div>
      
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_Local_Scope">Local Scope</h2>
               <blockquote>
                <ul>
                  <li>variable declared <strong>within</strong> a function</li>
                  <li>can only be accessed within that function</li>
                </ul>
               </blockquote>
               <p class="description">Example</p>
               <blockquote>
               <p class="description">
               &lt;!DOCTYPE html&gt; <br>
             &lt;html&gt;<br>
              &lt;body&gt;<br>
              &lt;?php<br>
              function myTest() {<br>
                $x = 5; // local scope<br>
                echo "&lt;p&gt;Variable x inside function is: $x&lt;/p&gt;";<br>
              } <br>
              <br>
              myTest();<br>
              // using x outside the function will generate an error<br>
              echo "&lt;p&gt;Variable x outside function is: $x&lt;/p&gt;";<br>
              ?&gt; <br>
              &lt;/body&gt;<br>
              &lt;/html&gt;<br>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
       <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_echo_and_print_Statements">PHP echo and print Statements</h2>
               <p class="description">With PHP, there are two basic ways to get output: echo and print.
The <strong>echo</strong> and <strong>print</strong> are more or less the same. They are both used to output data to the screen.
The differences are small: echo has no return value while print has a return value of 1 so it can be used in expressions. echo can take multiple parameters (although such usage is rare) while print can take one argument. echo is marginally faster than print.
</p>
               <blockquote>
               <p class="description">
               &lt;!DOCTYPE html&gt; <br>
             &lt;html&gt;<br>
              &lt;body&gt;<br>
              &lt;?php<br>
              print "&lt;h2&gt;PHP is Fun!&lt;/h2&gt;";<br>
              print "print&lt;br&gt;";<br>
              echo "echo";<br>
              ?&gt; <br>
              &lt;/body&gt;<br>
              &lt;/html&gt;<br>
               </blockquote></p>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent is-6">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_data_types">PHP Data Types</h2>
               <p class="description">Variables can store data of different types, and different data types can do different things.
PHP supports the following data types:
</p>
               <blockquote>
                <ul>
                  <li>String</li>
                  <li>Integer</li>
                  <li>Float (floating point numbers - also called double)</li>
                  <li>Boolean</li>
                  <li>Array</li>
                  <li>Object</li>
                  <li>NULL</li>
                  <li>Resource</li>
                </ul>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_string">PHP String</h2>
               <p class="description">A string can be any text inside quotes. You can use single or double quotes:
            </p>
               <blockquote>
               <p class="description">
               &lt;!DOCTYPE html&gt; <br>
             &lt;html&gt;<br>
              &lt;body&gt;<br>
              &lt;?php<br>
              $x = "Hello, this a string!";<br>
              <br>
              echo $x;<br>
              ?&gt; <br>
              &lt;/body&gt;<br>
              &lt;/html&gt;<br></p>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_integer">PHP Integer</h2>
               <p class="description">An integer data type is a non-decimal number. They are whole numbers, without a decimal point, like 4195.
            </p>
               <blockquote>
               <p class="description">Rules for Integers:
                    <ul>
                      <li>An integer must have at least one digit</li>
                      <li>An integer must not have a decimal point</li>
                      <li>An integer can be either positive or negative</li>
                      <li>Integers can be specified in: decimal (base 10), hexadecimal (base 16), octal (base 8), or binary (base 2) notation</li>
                    </ul></p>
               </blockquote>
               <p class="description">In the following example $x is an integer. The PHP var_dump() function returns the data type and value:</p>
               <blockquote>
               <p class="description">
               &lt;!DOCTYPE html&gt; <br>
              &lt;html&gt;<br>
              &lt;body&gt;<br>
              &lt;?php<br>
              $x = 5985;<br>
              var dump($x);<br>
              ?&gt; <br>
              &lt;/body&gt;<br>
              &lt;/html&gt;<br></p>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent is-6">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_float">PHP Float</h2>
               <p class="description">A float (floating point number) is a number with a decimal point or a number in exponential form.
            </p>
               
               <p class="description">Example</p>
               <blockquote>
               <p class="description">
               &lt;!DOCTYPE html&gt; <br>
              &lt;html&gt;<br>
              &lt;body&gt;<br>
              &lt;?php<br>
              $x = 10.365;<br>
              var dump($x);<br>
              ?&gt; <br>
              &lt;/body&gt;<br>
              &lt;/html&gt;<br></p>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        <div class="tile is-parent is-6">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_array">PHP Array</h2>
               <p class="description">An array stores multiple values in one single variable.
In the following example $cars is an array. The PHP var_dump() function returns the data type and value:
            </p>
            <p class="description">Example</p>
               <blockquote>
               <p class="description">
               &lt;!DOCTYPE html&gt; <br>
              &lt;html&gt;<br>
              &lt;body&gt;<br>
              &lt;?php<br>
              $cars = array("Volvo","BMW","Toyota");<br>
              var_dump($cars);<br>
              ?&gt; <br>
              &lt;/body&gt;<br>
              &lt;/html&gt;<br></p>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent is-6">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_operators">PHP Operators</h2>
               <p class="description">Operators are used to perform operations on variables and values.
PHP divides the operators in the following groups:</p>
               <blockquote>
               <ul>
                <li>Arithmetic operators</li>
                <li>Assignment operators</li>
                <li>Comparison operators</li>
                <li>Increment/Decrement operators</li>
                <li>Logical operators</li>
                <li>String operators</li>
                <li>Array operators</li>
                <li>Conditional assignment operators</li>
               </ul>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        <div class="tile is-parent is-6 is-vertical">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_boolean">PHP Boolean</h2>
               <p class="description">A Boolean represents two possible states: TRUE or FALSE. Booleans are often used in conditional testing. You will learn more about conditional testing in a later chapter of this tutorial.</p>
               <a class="button is-link read-more">View Example</a>
        </article>
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_assignment_operators">PHP Assignment Operators</h2>
               <p class="description">The PHP assignment operators are used with numeric values to write a value to a variable.
The basic assignment operator in PHP is "<strong>=</strong>". It means that the left operand gets set to the value of the assignment expression on the right.
</p>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_comparison_operators">PHP Comparison Operators</h2>
               <p class="description">The PHP comparison operators are used to compare two values (number or string):</p>
               <center><img src="images/php_comparison_operators.png" alt="Example1"></center>
               <br>
               <p class="description">Example</p>
               <blockquote>
                    <p class="description">
                    &lt;!DOCTYPE html&gt; <br>
                    &lt;html&gt;<br>
                    &lt;body&gt;<br>
                    &lt;?php<br>
                    $x = 100;  <br>
                      $y = "100";<br>
                      var_dump($x == $y); // returns true because values are equal<br>
                    ?&gt; <br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br></p>
               </blockquote>
               <br>
               <center><img src="images/not_Equal.png" alt="Example1"></center>
               <p class="description">Example</p>
               <blockquote>
                    <p class="description">
                    &lt;!DOCTYPE html&gt; <br>
                    &lt;html&gt;<br>
                    &lt;body&gt;<br>
                    &lt;?php<br>
                    $x = 100;  <br>
                      $y = "100";<br>
                      var_dump($x != $y); // returns false because values are equal<br>
                    ?&gt; <br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br></p>
               </blockquote>    
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_conditional_statements">PHP Conditional Statements</h2>
               <p class="description">Very often when you write code, you want to perform different actions for different conditions. You can use conditional statements in your code to do this.
In PHP we have the following conditional statements:
</p>
               <blockquote>
                <ul>
                  <li><strong>if statement</strong> - executes some code if one condition is true</li>
                  <li><strong>if...else statement</strong> - executes some code if a condition is true and another code if that condition is false</li>
                  <li><strong>if...elseif...else statement</strong> - executes different codes for more than two conditions</li>
                  <li><strong>switch statement</strong> - selects one of many blocks of code to be executed</li>
                </ul>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_if_statement">PHP - The if Statement</h2>
               <p class="description">The if statement executes some code if one condition is true.
</p> <p class="description"> Example</p>
               <blockquote>
               <p class="description">
                    &lt;!DOCTYPE html&gt; <br>
                    &lt;html&gt;<br>
                    &lt;body&gt;<br>
                    &lt;?php<br>
                    $t = date("H");  <br>
                    if ($t &lt; "20") {<br>
                      echo "Have a good day!";<br>
                    }<br>
                    ?&gt; <br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br></p>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_if...else_statement">PHP - The if...else Statement</h2>
               <p class="description">The if...else statement executes some code if a condition is true and another code if that condition is false.
</p> <p class="description"> Example</p>
               <blockquote>
               <p class="description">
                    &lt;!DOCTYPE html&gt; <br>
                    &lt;html&gt;<br>
                    &lt;body&gt;<br>
                    &lt;?php<br>
                    $t = date("H");  <br>
                    if ($t &lt; "20") {<br>
                      echo "Have a good day!";<br>
                    }else { <br>
                     echo "Have a good night!";<br>
                    }<br>
                    ?&gt; <br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br></p>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_if...elseif...else_statement">PHP - The if...elseif...else Statement</h2>
               <p class="description">The if...elseif...else statement executes different codes for more than two conditions.
</p> <p class="description"> Example</p>
               <blockquote>
               <p class="description">
                    &lt;!DOCTYPE html&gt; <br>
                    &lt;html&gt;<br>
                    &lt;body&gt;<br>
                    &lt;?php<br>
                    $t = date("H");<br>
                    echo "&lt;p&gt;The hour (of the server) is " . $t; <br>
                    echo ", and will give the following message:&lt;/p&gt;";<br>
                    if ($t &lt; "10") {<br>
                      echo "Have a good morning!";<br>
                    } elseif ($t &lt; "20") {<br>
                      echo "Have a good day!";<br>
                    } else {<br>
                      echo "Have a good night!";<br>
                    }<br>
                    ?&gt; <br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br></p>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
        </article>
        </div>
        </div>
        <div class="tile is-ancestor">
        <div class="tile is-parent">
        <article class="tile is-child content task">
              <p><a href="" class="tag is-dark">2 min read</a></p>
               <h2 class="title" id ="php_switch_statement">PHP switch Statement</h2>
               <p class="description">The switch statement is used to perform different actions based on different conditions.
</p> <p class="description"> Example</p>
               <blockquote>
               <p class="description">
                    &lt;!DOCTYPE html&gt; <br>
                    &lt;html&gt;<br>
                    &lt;body&gt;<br>
                    &lt;?php<br>
                    $favcolor = "red";<br>
                    switch ($favcolor) {<br>
                    case "red":<br>
                      echo "Your favorite color is red!";<br>
                      break;<br>
                    case "blue":<br>
                      echo "Your favorite color is blue!";<br>
                      break;<br>
                    case "green":<br>
                      echo "Your favorite color is green!";<br>
                      break;<br>
                    default:<br>
                      echo "Your favorite color is neither red, blue, nor green!";<br>
                    }<br>
                    ?&gt; <br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br></p>
               </blockquote>
               <a class="button is-link read-more">View Example</a>
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
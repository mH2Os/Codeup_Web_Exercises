<?php
	var_dump($_POST);
	var_dump($_GET);

?>

<html>
<head>
	<title>My First Form</title>
</head>
<body>
	<form method="POST">
		<h2>Login</h2>
		<p>
			<label for="first_name">Name:</label>
			<input type="text" name="first_name" id="first_name" placeholder="First" />
			<input type="text" name="last_name" id="last_name" placeholder="Last" /><br />

			<label for="password">Password:</label>
			<input type="password" name="password" id="password" placeholder="Password" />
		</p>
		<input type="submit"/>
	</form>
	<form method="POST">
		<h2>Compose an Email</h2>
		<p>
			<input type="email" name="email" id="email" placeholder="Email" /><br>
			<input type="text" name="subject" id="subject" placeholder="Subject" /><br>
			<textarea type="body" name="body" id="body" placeholder="Body Text"/></textarea><br>
			
			<label for="save">
		    <input type="checkbox" checked id="save" name="save" value="yes">
		    <label for="save">Save copy to sent folder</label>
			</label>
		</p>
		<input type="submit" value="Send" />
	</form>
	<form method="POST">
		<h2>Multiple Choice Test</h2>
		<p>
			<label>
				<label for="q1">What is the capital of Texas?</label><br>
			    <input type="radio" id="q1a" name="q1" value="houston">
			    Houston
			</label><br>
			<label>
			    <input type="radio" id="q1b" name="q1" value="dallas">
			    Dallas
			</label><br>
			<label>
			    <input type="radio" id="q1c" name="q1" value="austin">
			    Austin
			</label><br>
			<label>
			    <input type="radio" id="q1d" name="q1" value="san antonio">
			    San Antonio
			</label>
		</p>
		<p>
			<label>
				<label for="q2">If Manny has 3 apples and 6 oranges and the day of the week is Tuesday during a full moon,<br> What is the cows favorite colour?</label><br>
			    <input type="radio" id="q1a" name="q2" value="red">
			    Red
			</label><br>
			<label>
			    <input type="radio" id="q1b" name="q2" value="orange">
			    Orange
			</label><br>
			<label>
			    <input type="radio" id="q1d" name="q2" value="yellow">
			    Yellow
			</label><br>
			<label>
			    <input type="radio" id="q1c" name="q2" value="green">
			    Green
			</label><br>
			<label>
			    <input type="radio" id="q1d" name="q2" value="blue">
			    Blue
			</label><br>
			<label>
			    <input type="radio" id="q1d" name="q2" value="purple">
			    Purple
			</label><br>
			<label>
			    <input type="radio" id="q1d" name="q2" value="other">
			    Other
			</label>
		</p>
		<p>
			<label>
		    <label for="q3">What are your top two favorite animals?</label><br>
		    <input type="checkbox" id="q1d" name="q3" value="cow">
		    Cow
		    </label><br>
		    <label>
		    <input type="checkbox" id="q1d" name="q3" value="Manatee">
		    Manatee
		    </label><br>
		    <label>
		    <input type="checkbox" id="q1d" name="q3" value="Sea Cow">
		    Sea Cow 
		    </label><br>
		    <label>
		    <input type="checkbox" id="q1d" name="q3" value="Land Manatee">
		    Land Manatee
		    </label>
		</p>
		<p>
			<label for="age">What year were you born?</label>
			<select id="age" name="age">
			    <option selected>--Select Year--</option>
			    <option>2010</option>
			    <option>2009</option>
			    <option>2008</option>
			    <option>2007</option>
			    <option>2006</option>
			    <option>2005</option>
			    <option>2004</option>
			    <option>2003</option>
			    <option>2002</option>
			    <option>2001</option>
			    <option>2000</option>
			    <option>1999</option>
			    <option>1998</option>
			    <option>1997</option>
			    <option>1996</option>
			    <option>1995</option>
			    <option>1994</option>
			    <option>1993</option>
			    <option>1992</option>
			    <option>1991</option>
			    <option>1990</option>
			    <option>1989</option>
			    <option>1988</option>
			    <option>1987</option>
			    <option>1986</option>
			    <option>1985</option>
			    <option>1984</option>
			    <option>1983</option>
			    <option>1982</option>
			    <option>1981</option>
			    <option>1980</option>
			    <option>1979</option>
			    <option>1978</option>
			    <option>1977</option>
			    <option>1976</option>
			    <option>1975</option>
			    <option>1974</option>
			    <option>1973</option>
			    <option>1972</option>
			    <option>1971</option>
			    <option>1970</option>
			    <option>1969</option>
			    <option>1968</option>
			    <option>1967</option>
			    <option>1966</option>
			    <option>1965</option>
			    <option>1964</option>
			    <option>1963</option>
			    <option>1962</option>
			    <option>1961</option>
			    <option>1960</option>
			    <option>1959</option>
			    <option>1958</option>
			    <option>1957</option>
			    <option>1956</option>
			    <option>1955</option>
			    <option>1954</option>
			    <option>1953</option>
			    <option>1952</option>
			    <option>1951</option>
			    <option>1950</option>
			</select>
		</p>
		<input type="submit" />


	</form>

</body>
</html>
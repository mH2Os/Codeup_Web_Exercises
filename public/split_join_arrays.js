// todo:
// Copy the array of planets you created in the last lesson.
var planets = ['Mercury', 'Venus', 'Earth', 'Mars', 'Jupiter', 'Saturn', 'Uranus', 'Neptune'];

// todo: Join the planets array with pipes (|) to create a variable named 'planetsAsString'.

	console.log(planets);
	// [M,V,E,M,J,S,U,N]

	var planetsAsString = planets.join('|');

	console.log(planetsAsString);

// todo: Split the 'planetsAsString' variable by pipes (|) to create a variable named 'planetsAsArray'.
	
	var planetsAsArray = planetsAsString.split('|');

	console.log(planetsAsArray);


// Split
// var namesString = "Joe,Bob,Sally";

// console.log(namesString);
// // Joe,Bob,Sally

// var namesArray = namesString.split(',');

// console.log(namesArray);
// // ['Joe', 'Bob', 'Sally']



// Join
// var namesArray = ['Joe', 'Bob', 'Sally'];

// console.log(namesArray);
// // ['Joe', 'Bob', 'Sally']

// // Joe,Bob,Sally

// var namesString = namesArray.join(',');

// console.log(namesString);
// // Joe,Bob,Sally
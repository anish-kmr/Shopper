window.addEventListener('load',()=>{

	addEvent();


	
	
	let home=document.getElementsByClassName("header-list")[2];
	home.addEventListener('click', ()=>{
		alert("Login again and then Logout to prevent Data Loss");
	})

	let logout=document.getElementById('logout');
	logout.addEventListener('click', ()=>{
		alert("logged out");
		window.location.href="logout.php";
	})


}) 
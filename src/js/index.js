

window.addEventListener('load',()=>{

/*
	 $.getJSON('data.json',(data) =>{
	 	console.log(data);
	 });
*/
	display();

	window.addEventListener('scroll',(ev)=>{
		// let y=pageYOffset;
		// let trigger=document.getElementsByTagName("header")[0].scrollHeight;
		// console.log("trigger",trigger);
		// if (y>(trigger)*0.15) {
		// 	document.getElementsByTagName('header')[0].classList.add("sticky");
		// }
		// if (y<(trigger)*0.15) {
		// 	document.getElementsByTagName('header')[0].classList.remove("sticky");
		// }

		// console.log(y)

		let y=pageYOffset;
		let trigger=document.getElementsByTagName("header")[0].scrollHeight;
		console.log("trigger",trigger);
		if (y>(trigger)*0.15) {
			document.getElementsByTagName('header')[0].classList.add("sticky");
		}
		if (y<(trigger)*0.15) {
			document.getElementsByTagName('header')[0].classList.remove("sticky");
		}

		console.log(y)

		let side=document.getElementsByTagName("aside")[0];
		let w=side.offsetWidth;
		console.log("width",w)
		let length=document.getElementsByClassName("banner")[0].scrollHeight;
		console.log("length",length)
		if(y>length){
			side.classList.add("side");
			document.getElementsByClassName("side")[0].style.width=`${w}px`;
		}
		if(y<length){
			side.classList.remove("side");
		}


	})

	let login=document.getElementById('login');
	let modal=document.getElementsByClassName("modal")[0];
	let close=document.getElementsByClassName("cross")[0];
	login.addEventListener('click',(ev)=>{
		modal.style.top="50%";
	});

	close.addEventListener('click',()=>{
		modal.style.top="-50%";
	})

	let signup=document.getElementById('signup');
	let modal1=document.getElementsByClassName("modal")[1];
	let close1=document.getElementsByClassName("cross")[1];
	signup.addEventListener('click',(ev)=>{
		modal1.style.top="50%";
	});

	close1.addEventListener('click',()=>{
		modal1.style.top="-50%";
	})




		let sub=document.getElementById('login-sub');
		sub.addEventListener('click',()=>{
			let uname=document.getElementById('username').value;
			let upwd=document.getElementById('pwd').value;
			console.log(uname,upwd);
			for(let i =0;i<pass.length;i++){
				if(uname==pass[i].userid && upwd==pass[i].password){
					let  per=JSON.parse(localStorage.getItem(uname));
					console.log("per",per)
					let details=per || {};
					localStorage.setItem(`${uname}`,JSON.stringify(details));
					localStorage.setItem('uname', uname);
					document.getElementById('passed').setAttribute("href","userhome.html");
					break;
				}
				else if(i==pass.length-1){
					alert("wrong")
				}

			}
			

		})



})


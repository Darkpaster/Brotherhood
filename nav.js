// const button_1 = document.getElementsByClassName('nav_button_1990');


// let nav_1990_2000 = document.getElementsByClassName('downloads_info_1990-2000');


id2000_2010.style.display = "none";
id2010_2021.style.display = "none";
id1990_2000.style.display = "none";

function correct_content() {
	const height = 'fit-content'
id_mainBody.style.height = height;
const height_y = id_mainBody.offsetHeight;
height_y < 100 ? id_paper_div.style.height = 100 + 'px' : id_paper_div.style.height = height_y + 'px';
console.log("sdasdasd");
}

correct_content();

button_1.addEventListener("click", () => { 
	if (button_1.className === "nav_button_active") {

	 } 
	 else if (button_2.className === "nav_button_active") {
		id2000_2010.style.display = "none";
		id2010_2021.style.display = "none";
		id1990_2000.style.display = "";
		button_1.className = "nav_button_active";
		button_2.className = "nav_button_none";
		button_3.className = "nav_button_none";

	} else if (button_3.className === "nav_button_active") {
		id2000_2010.style.display = "none";
		id2010_2021.style.display = "none";
		id1990_2000.style.display = "";
		button_1.className = "nav_button_active";
		button_2.className = "nav_button_none";
		button_3.className = "nav_button_none";

	} else {
		id1990_2000.style.display = "";
		button_1.className = "nav_button_active";

	}

correct_content();
	
});

button_2.addEventListener("click", () => { 
		if (button_1.className === "nav_button_active") {
		id2000_2010.style.display = "";
		id2010_2021.style.display = "none";
		id1990_2000.style.display = "none";
		button_1.className = "nav_button_none";
		button_2.className = "nav_button_active";
		button_3.className = "nav_button_none";

	} else if (button_2.className === "nav_button_active") {
		

	} else if (button_3.className === "nav_button_active") {
		id2000_2010.style.display = "";
		id2010_2021.style.display = "none";
		id1990_2000.style.display = "none";
		button_1.className = "nav_button_none";
		button_2.className = "nav_button_active";
		button_3.className = "nav_button_none";

	} else {
		id2000_2010.style.display = "";
		button_2.className = "nav_button_active";

	}
correct_content();
	
});

button_3.addEventListener("click", () => { 
		if (button_1.className === "nav_button_active") {
			id2000_2010.style.display = "none";
		id2010_2021.style.display = "";
		id1990_2000.style.display = "none";
		button_1.className = "nav_button_none";
		button_2.className = "nav_button_none";
		button_3.className = "nav_button_active";

	} else if (button_2.className === "nav_button_active") {
		id2000_2010.style.display = "none";
		id2010_2021.style.display = "";
		id1990_2000.style.display = "none";
		button_1.className = "nav_button_none";
		button_2.className = "nav_button_none";
		button_3.className = "nav_button_active";

	} else if (button_3.className === "nav_button_active") {
		

	} else {
		id2010_2021.style.display = "";
		button_3.className = "nav_button_active";

	}
correct_content();
	
});

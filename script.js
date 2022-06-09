function correct_content() {
	const height = 'fit-content'
id_mainBody.style.height = height;
const height_y = id_mainBody.offsetHeight;
height_y < 100 ? id_paper_div.style.height = 100 + 'px' : id_paper_div.style.height = height_y + 'px';
console.log("sdasdasd");
}

correct_content();

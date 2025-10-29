// For Toggle Profile

function toggleMenu() {

    document.getElementById("subMenu").classList.toggle("open-menu");
}

// For Print

function printFun(printpara) {
    var backup = document.body.innerHTML;
    var divcontent = document.getElementById(printpara).innerHTML;
    document.body.innerHTML = divcontent;
    window.print();
    document.body.innerHTML = backup;
}

// For Show Image

function showImage(input, img) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imageElement = document.getElementById(img);
            imageElement.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

// For Generate Customer Id

const generateId= (e) =>{

    e.preventDefault();

    var max = 1000000;
    var min = 100000;
    var ranId = Math.floor(Math.random() * (max - min)) + min;
    document.getElementById("customerid").value = ranId;

}

// For Generate Account Number

const generateAccNo= (e)=>{

    e.preventDefault();

    var max = 1000000000;
    var min = 100000000;
    var ran = Math.floor(Math.random() * (max - min)) + min;

    var temp = 891786 + "" + ran;

    document.getElementById("accountnumber").value = temp;
 
}
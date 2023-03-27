let lance=document.querySelector("#lance");
let save=document.querySelector("#save");
let score=document.querySelector("#score");
let img=document.querySelector("img")
let nv=document.querySelector("#nv")
let pscore=document.querySelector("#pscore")

nv.addEventListener("click",()=>{
    window.location.reload("true");
});

let i=0;let s=0;

function image(){
    let a=Math.floor(Math.random()*6) 
      s+=(a+1);
    img.setAttribute("src","images/"+(a+1)+".svg")
        if(a==0){
            s=0;
        pscore.textContent=0;
    } 
        if(s>101){
            alert("winner");
            pscore.textContent=0;
            window.location.reload();
        }
        else pscore.textContent="Sum="+s;
        i++;
        let f=(s/i).toFixed(2);
       score.textContent=f;
}
lance.addEventListener("click",image)

save.addEventListener("click",sendscore)

function sendscore(){
    let req=new XMLHttpRequest();
    req.open("POST","index.php")
if( req.readystate==4 && req.status==200){
    console.log("great");
    }
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send(`score=${score.textContent}`);
}

 
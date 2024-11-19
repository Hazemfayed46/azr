 //متغيرات 1ذر تحديد المنشور عالمي ام بين اصدقاء 2 ذر العالمي 3 ذر الاصدقاء
    let peosystem = document.getElementById("peosystem");
    let global = document.getElementById("global");
    let friends = document.getElementById("friends");//نهاية
    
document.getElementById("hide-people").style.display='none';
let people = document.getElementById("people");
    
//لاخفاء الاذرار و ظهورها في people
    peosystem.style.display='none';
    function people1(hello){
        peosystem.style.display='block';
        people.style.backgroundColor = 'yellow';
document.getElementById("hide-people").style.display='block';
people.style.display='none';

    };
    //نهاية
    //لتغيير لون الذر الاصدقاء الي لون اخضر عند ضغط عليه
     function friends1(g){
        
        document.getElementById("friends").style.backgroundColor = 'green';
        global.style.backgroundColor = 'red';

    };
        //نهاية
        //لتغيير لون ذر العالمي للمنشورات عند ضغط عليها
    function global1(f){
        let global = document.getElementById("global");
        global.style.backgroundColor = 'green';
        document.getElementById("friends").style.backgroundColor = 'red';
        
    };//نهاية
    //اظهار النتيجة الخاصة للمستخدم لاضافة منشور 
    let address = document.getElementById("address");
    let result = document.getElementById("result");
    function addr(addr){
        result.style.backgroundColor = "black";
        result.style.height = "400px";
        result.style.witdh = "50px";
        result.innerHTML = `<h1 height="200px" witdh="200px"  style='align:centre;color:white;'>`+address.value+`</h1>`;
//nem


//new
    }
    //النهاية
     //للتغيير استايل المنشور 
      
     let hidecolortext = document.getElementById("hidecolortext");
 let showcolortext = document.getElementById("showcolortext");


 let colortxt = document.getElementById("colortxt");
colortxt.style.display='none';
hidecolortext.style.display='none';

 function showcolortexta(hellow){
    colortxt.style.display='block';
    showcolortext.style.display='none';
    hidecolortext.style.display='block';

    };
    
 function showcolortextaa(helloww){
    colortxt.style.display='none';
    showcolortext.style.display='block';
    hidecolortext.style.display='none';
    };
    function change(helloo){
        result.style.backgroundColor = helloo;

    }
    //fsgfdgsgsfgsfg
    let posttype = document.getElementById("posttype");
posttype.style.display = 'none';
    let hideetypepost = document.getElementById("hide-type-post");
hideetypepost.style.display='none';

    //sgsfgfsdgdfghdfg
 //عند ضغط علي اظهار نوع post
function showtypeposts(helooo){
posttype.style.display = 'block';
document.getElementById("showtypepost").style.background = 'yellow';
document.getElementById("showtypepost").style.display = 'none';
hideetypepost.style.display='block';

}
function hidetypeposts(htp){
document.getElementById("showtypepost").style.display = 'block';
hideetypepost.style.display='none';
posttype.style.display = 'none';


}
//نوع المنشور
    let img =document.getElementById("img");
   let video =document.getElementById("video");
  let url =document.getElementById("url");
  let txtbox =document.getElementById("txtbox");
  let upload =document.getElementById("upload");
  let desandaddresss =document.getElementById("desandaddresss");
  let desandaddress =document.getElementById("desandaddress");
  desandaddresss.style.display = 'none';
  desandaddress.style.display = 'none';
  address.style.display = 'none';
  des.style.display = 'none';
  let div_url_button =document.getElementById("div-url-button");
  div_url_button.style.display = 'none';
  upload.style.display = 'none';
 let showcolortexts =document.getElementById("showcolortexts");
  showcolortexts.style.display = 'none';

   function  imgpost(iimg){
    img.style.backgroundColor ="green";
    video.style.backgroundColor ="red";
    url.style.backgroundColor ="red";
    txtbox.style.backgroundColor ="red";
    desandaddresss.style.display = 'none';
    desandaddress.style.display = 'none';
    address.style.display = 'none';
    des.style.display = 'none';
    div_url_button.style.display = 'none';
    upload.style.display = 'block';

    showcolortexts.style.display = 'none';

    
  
 }
 function  videopost(vvideo){
    let uploadss = document.getElementById("uploadss")
    img.style.backgroundColor ="red";
    video.style.backgroundColor ="green";
    url.style.backgroundColor ="red";
    txtbox.style.backgroundColor ="red";
    div_url_button.style.display = 'none';
    desandaddresss.style.display = 'none';
    desandaddress.style.display = 'none';
    address.style.display = 'none';
    des.style.display = 'none';
    upload.style.display = 'block';
    showcolortexts.style.display = 'none';

 }
 function  urlpost(uurl){
    img.style.backgroundColor ="red";
    video.style.backgroundColor ="red";
    url.style.backgroundColor ="green";
    txtbox.style.backgroundColor ="red";
    div_url_button.style.display = 'block';
    desandaddresss.style.display = 'none';
    desandaddress.style.display = 'none';
    address.style.display = 'none';
    des.style.display = 'none';
    upload.style.display = 'none';

    showcolortexts.style.display = 'none';

 }
  function  txtboxx(ttxtbox){
    img.style.backgroundColor ="red";
    video.style.backgroundColor ="red";
    url.style.backgroundColor ="red";
    txtbox.style.backgroundColor ="green";
    div_url_button.style.display = 'none';
    desandaddresss.style.display = 'block';
    desandaddress.style.display = 'block';
    address.style.display = 'block';
    des.style.display = 'block';
    upload.style.display = 'none';
    showcolortexts.style.display = 'block';

    
 }
 function people2(hidepeo){
 peosystem.style.display='none';
 document.getElementById("hide-people").style.display='none';
 people.style.display='block';
 }
 //النهاية
 //feelingbutton
 let feelsbutton = document.getElementById("showfeeling");
 let feels = document.getElementById("feels");
 feels.style.display='none';
 let hidefeels = document.getElementById("hidefeeling");
 function feelingbutton(feel){
    feels.style.display='block';
feelsbutton.style.display='none';
hidefeels.style.display='block';
hidefeels.style.backgroundColor='red';

 }
 hidefeels.style.display='none';

 function hidefeelingbutton(hidefeel){
feelsbutton.style.backgroundColor = 'yellow';
    feels.style.display='none';
    hidefeels.style.display='none';
    feelsbutton.style.display='block';

 }

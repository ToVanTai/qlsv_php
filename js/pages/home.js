import { $, $$ } from "../configs/constants.js";
import { baseUrl, accountRegular, passwordRegular } from "../configs/configs.js";

async function showListStudent(){
    await new Promise((resolve, rejext)=>{
        fetch(`${baseUrl}controller/students.php`,{
            method:"GET",
            credentials:"include"
        }).then(res=>{
            res.text().then(res=>{
                resolve(JSON.parse(res))
            })
        }).catch(e=>rejext(e))
    }).then(res=>{
        if(res.length>=1){
            let listStudent = $("#listStudent");
            listStudent.innerHTML = "";
            let dataHtml = "";
            res.forEach(item=>{
                dataHtml+=`
                <tr>
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.age}</td>
                    <td>${item.sex==0?"Nữ":"Nam"}</td>
                    <td>${item.address}</td>
                    <td>${item.class}</td>
                    <td>
                        <a href="index.php?view-mode=show&id=${item.id}"  class="btn show" id="btn-show">Sửa</a>
                        <button  class="btn del" data-id=${item.id}>Xóa</button>
                    </td>
                </tr>
                `
            })
            listStudent.innerHTML = dataHtml;
        }
    }).catch(e)
}
function handleDeleteStudent(){
    let listBtnDelete = $$(".btn.del");
    
    listBtnDelete.forEach(item=>{
        item.addEventListener('click',function(){
            let id = this.dataset.id;
            let isConfirm = confirm(`Bạn có muấn xóa ${id}?`);
            if(isConfirm){
                fetch(`${baseUrl}controller/students.php?id=${id}`,{
                    method:"DELETE",
                    credentials:"include"
                }).then(res=>{
                    if(res.status===200||res.status===201){
                        alert("Xoa thanh cong!")
                        window.location.reload();
                    }else{
                        alert("Xoa that bai");
                    }
                })
            }
        })
    })
}
async function mainFn(){
    try{
        await showListStudent();
        handleDeleteStudent();
    }catch(e){
    }
}
mainFn()

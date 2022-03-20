$(".btnedit").click(e=>{

let textvalues= displayData(e)
let id=$("input[name*='Product_Id']");
    let sku=$("input[name*='sku']");
    let productName=$("input[name*='product_name']");
    let productPrice=$("input[name*='product_price']");
    let producttype=$("input[name*='product_type']");

    id.val(textvalues[0]);
    sku.val(textvalues[1]);
    productName.val(textvalues[2]);


    productPrice.val(textvalues[3].replace("$", ""));
    producttype.val(textvalues[4]);



});







function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){

textvalues[id++]=value.textContent;


        }
    }
    return textvalues;

}

let prices = document.querySelectorAll(".price");
let i = 0;
function separate(Number)
{
    Number = Number.textContent;
    Number+= '';
    Number= Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z= x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y= y.replace(rgx, '$1' + ',' + '$2');
    prices[i].textContent = y;
    i++;
}
prices.forEach(separate);

function cop(item) {
    let text = item.innerText;
    navigator.clipboard.writeText(text);
    alert("متن کپی شد .");
}

function change(node)
{
var li=document.getElementsByTagName("li");
var i=0;
for(i;i<4;i++)
{
li[i].className="";
}
node.className="active";
}
function buttonEventHandler(course_id) {

    if (course_id.checked == true)
    {
        const nodeList = document.querySelectorAll(".course_class");
        for (let i = 0; i < nodeList.length; i++)
        {
            let counter = (document.querySelectorAll('#' +course_id.value).length);
            if (counter <1)
            {
                if (nodeList[i].value == course_id.value)
                {
                    const att = document.createAttribute("id");
                    att.value = course_id.value;
                    const node = document.createElement("p");
                    const textnode = document.createTextNode(course_id.value);
                    node.appendChild(textnode);
                    document.getElementById("selected_course").appendChild(node).setAttributeNode(att);
                }
            }
        }
    }
    else
    {
        document.getElementById(course_id.value).remove();
    }
}
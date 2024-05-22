

btn_delete_element = document.getElementById('delete-section');
btn_add_element = document.getElementById('add-section');

//btn_delete_element.addEventListener('click', deleteSection);
//btn_add_element.addEventListener('click', addSection);

min = 1;
max = 10;
let sectionCount = min;

function addSection() {

    if (sectionCount < max) {

        console.log("ddddd");
        sectionText = 'セクション';
        sectionTitleLabel = 'セクションタイトル';
        sectionMainLabel = 'セクション本文';
        sectionCount++;

        let span_element_section = document.createElement('span');
        let span_element_title = document.createElement('span');
        let input_element_title = document.createElement('input');
        let span_element_mainText = document.createElement('span');
        let input_element_mainText = document.createElement('textarea');
        let div_element = document.createElement('div');
        let div_element_indent = document.createElement('div');

        div_element.classList.add('row-right');
        div_element_indent.classList.add('indent');
        span_element_section.classList.add('section');
        span_element_title.classList.add('label');
        input_element_title.classList.add('input');
        input_element_title.name = 'title' + sectionCount;
        span_element_mainText.classList.add('label')
        input_element_mainText.classList.add('input');
        input_element_mainText.name = 'main_text' + sectionCount;

        span_element_section.textContent = sectionText + String(sectionCount);
        span_element_title.textContent = sectionTitleLabel;
        span_element_mainText.textContent = sectionMainLabel;


        div_element.appendChild(span_element_section);
        div_element_indent.appendChild(span_element_title);
        div_element_indent.appendChild(input_element_title);
        div_element_indent.appendChild(span_element_mainText);
        div_element_indent.appendChild(input_element_mainText);

        div_element.appendChild(div_element_indent);

        let parent = document.getElementById('section-group');

        parent.appendChild(div_element);
    }
}
function deleteSection() {
    if (sectionCount > min) {
        sectionCount--;
        let parent = document.getElementById('section-group');
        parent.removeChild(parent.lastElementChild);
    }
}
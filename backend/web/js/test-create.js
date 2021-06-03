const $questCountInput = $('#input-count');
const $questCountBtn = $('.btn-count');
const $testContainer = $('.test-container');
const $createtestBtn = $('.createtest');

$questCountBtn.click((e) => {
    e.preventDefault();

    generateQuestionField($questCountInput.val());
    document.querySelectorAll('#questtype').forEach((item, idx) => {
        item.addEventListener('change', e => questionAnswReturn(e, idx));
    });

    if (($questCountInput.val() != '') && ($questCountInput.val() != 0))
        if ($createtestBtn.hasClass('hideelem'))
            $createtestBtn.removeClass('hideelem');
});

$createtestBtn.click(() => {
    const allAnswInputs = document.querySelectorAll('.radio-cont');
    const $subject = document.querySelector('.subj').value;
    let testObj = {
        testname: $('.testname').val(),
        subj: document.querySelector('.subj').value,
        questions: {}
    };

    allAnswInputs.forEach((item, idx) => {
        testObj.questions[idx] = {
            name: item.querySelector('.questval').value,
            type: item.parentElement.querySelector('#questtype').value,
            answ: {
                [item.querySelectorAll('.answ')[0].value]: (item.querySelectorAll('.radio-check')[0].checked) ? 1 : 0,
                [item.querySelectorAll('.answ')[1].value]: (item.querySelectorAll('.radio-check')[1].checked) ? 1 : 0,
                [item.querySelectorAll('.answ')[2].value]: (item.querySelectorAll('.radio-check')[2].checked) ? 1 : 0,
                [item.querySelectorAll('.answ')[3].value]: (item.querySelectorAll('.radio-check')[3].checked) ? 1 : 0
            }
        };
    });

    console.log(testObj);
    // console.log(allAnswInputs);
    $.ajax({
        url: 'writedbtest',
        method: 'get',
        dataType: 'json',
        data: testObj
    });
});

function generateQuestionField(count) {
    let fragment = document.createDocumentFragment();

    for (let i = 0; i < count; i++) {
        fragment.appendChild(questionSelectTypeReturn());
    }

    $testContainer.append(fragment);
}

function questionSelectTypeReturn() {
    let container = document.createElement('div');
    container.innerHTML =
        '<div>' +
        '<label class="control-label" for="record-status">Тип вопроса</label>' +
        '<select id="questtype" class="form-control" style="width: 40%">' +
        '<option value="">Тип вопроса</option>' +
        '<option value="0">С одним вариантом ответа</option>' +
        '<option value="1">С несколькими вариантами ответа</option>' +
        '</select>' +
        '' +
        '</div>';
    return container;
}

let radioCont = '';

function questionAnswReturn(e, idx) {
    if (radioCont = e.target.parentElement.querySelector('.radio-cont')) {
        e.target.parentElement.removeChild(radioCont);
    }

    if (e.target.value == 0)
        e.target.parentElement.insertAdjacentHTML('beforeend', '' +
            '<div class="radio-cont">' +
            '<label class="control-label" for="focusedInput1">Вопрос: </label>' +
            '<input class="form-control questval" id="focusedInput1" type="text">' +
            `<div class="radio">
                <input name="${idx}" type="radio" class="radio-check"/><input type="text" class="answ"></input>
             </div>` +
            `<div class="radio">
                <input name="${idx}" type="radio" class="radio-check"/><input type="text" class="answ"></input>
             </div>` +
            `<div class="radio">
                <input name="${idx}" type="radio" class="radio-check"/><input type="text" class="answ"></input>
             </div>` +
            `<div class="radio">
                <input name="${idx}" type="radio" class="radio-check"/><input type="text" class="answ"></input>
             </div>` +
            '</div>'
        );
    else
        e.target.parentElement.insertAdjacentHTML('beforeend', '' +
            '<div class="radio-cont">' +
            '<label class="control-label" for="focusedInput2">Вопрос: </label>' +
            '<input class="form-control questval" id="focusedInput2" type="text">' +
            `<div class="radio"><input name="${idx}" type="checkbox" class="radio-check"/><input type="text" class="answ"></input></div>` +
            `<div class="radio"><input name="${idx}" type="checkbox" class="radio-check"/><input type="text" class="answ"></input></div>` +
            `<div class="radio"><input name="${idx}" type="checkbox" class="radio-check"/><input type="text" class="answ"></input></div>` +
            `<div class="radio"><input name="${idx}" type="checkbox" class="radio-check"/><input type="text" class="answ"></input></div>` +
            '</div>'
        );
}
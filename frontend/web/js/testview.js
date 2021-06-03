const $finishTestBtn = $('.finishtest');

$finishTestBtn.click((e) => {
    e.preventDefault();

    let quest = {};
    document.querySelectorAll('.quest-container').forEach((item, idx) => {
        let answ = {};
        const spans = item.querySelectorAll('.check-span');
        item.querySelectorAll('.radio-check').forEach((itemm, idxx) => {
            answ[spans[idxx].textContent] = (itemm.checked) ? 1 : 0;
            quest[itemm.name] = answ;
        });
    });

    $.ajax({
        url: 'checktest',
        method: 'get',
        dataType: 'json',
        success: (response) => {
            console.log(response);
        },
        error: () => {
            console.log('Error!')
        },
        data: {
            'quest': quest,
            'id': document.querySelector('.site-testview').getAttribute('name')
        }
    });
});

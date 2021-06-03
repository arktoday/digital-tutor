const $radios = $('input:radio');
const $sendTestBtn = $('.sendtest');

// Реалистический
const real = ['a1', 'a4', 'a7', 'a10', 'a13', 'a16', 'a19', 'a22', 'a25', 'a28'];
// Интеллектуальный
const int = ['a2', 'a5', 'a8', 'a11', 'a14', 'a17', 'a20', 'a23', 'a26', 'a29'];
// Социальный
const soc = ['b1', 'b4', 'b7', 'b10', 'b13', 'b16', 'b19', 'b22', 'b25', 'b28'];
// Конвенциональный (Офисный)
const conv = ['a3', 'a6', 'a9', 'a12', 'a15', 'a18', 'a21', 'a24', 'a27', 'a30'];
// Предпринимательский
const ent = ['b2', 'b5', 'b8', 'b11', 'b14', 'b17', 'b20', 'b23', 'b26', 'b29'];
// Артистический
const art = ['b3', 'b6', 'b9', 'b12', 'b15', 'b18', 'b21', 'b24', 'b27', 'b30'];

$sendTestBtn.click((e) => {
    let answ = {};
    let count = 1;
    let real_count = 0;
    let int_count = 0;
    let soc_count = 0;
    let conv_count = 0;
    let ent_count = 0;
    let art_count = 0;


    e.preventDefault();
    for (let i = 0; i < $radios.length; i++) {
        answ[count] = {
            a: {a: $radios[i].value, checked: $radios[i].checked}
        }
        let idx = i += 1;
        answ[count].b = {b: $radios[idx].value, checked: $radios[idx].checked}
        if (!answ[count].a.checked) {
            if (!answ[count].b.checked) {
                console.log(false);
                return false;
            }
        }
        count++;
    }

    let checked_answ = [];
    for (key in answ) {
        (answ[key].a.checked) ? checked_answ.push(answ[key].a.a) : checked_answ.push(answ[key].b.b);
    }

    real_count = checked_answ.filter((obj) => real.indexOf(obj) >= 0).length;
    int_count = checked_answ.filter((obj) => int.indexOf(obj) >= 0).length;
    soc_count = checked_answ.filter((obj) => soc.indexOf(obj) >= 0).length;
    conv_count = checked_answ.filter((obj) => conv.indexOf(obj) >= 0).length;
    ent_count = checked_answ.filter((obj) => ent.indexOf(obj) >= 0).length;
    art_count = checked_answ.filter((obj) => art.indexOf(obj) >= 0).length;

    $.post('/prof/db-write-result', {real_count, int_count, soc_count, conv_count, ent_count, art_count});
});




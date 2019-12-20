

         d = document,
        str = d.getElementsByClassName('coordname').length,
       cl=3,
    mas=[];
    for (var i = 0; i < str; i++) {
        mas[i]=new Array;
        for (var j = 0; j < cl; j++) {
        mas[i][j] = 0;
    }}




    function save(mas) {
        d = document,
        inp = d.getElementsByClassName('coordname');
        for (var i = 0; i < inp.length; i++) {
            mas[i][0] = inp[i].value;
        }

    }
    save(mas);




    function save1(mas) {
        d = document,
        inp = d.getElementsByClassName('width');
        for (var i = 0; i < inp.length; i++) {
            mas[i][1] = inp[i].value;
        }

    }
    save1(mas);




    function save2(mas, inp) {
        d = document,
        inp = d.getElementsByClassName('hight');
        for (var i = 0; i < inp.length; i++) {
            mas[i][2] = inp[i].value;
        }

    }
    save2(mas);

    console.log(mas);
    asd=mas[5][1];
    dsa=mas[5][2];
    console.log(asd);
    console.log(dsa);


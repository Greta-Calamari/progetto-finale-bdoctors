import axios from 'axios';
import Chart from 'chart.js/auto';
let dati = []
const paramsObj = {
    params: {
        id: document.getElementById('id').innerHTML,
    }
}
axios.get('api/messages/', paramsObj).then((res)=>{
    let messages = Object.values(res.data)
    //console.log(messages)
    messages.forEach((item)=>{
        //console.log(item)
        dati.push(item.length)
        //console.log(dati)
    })
    //console.log(message)
})
console.log(dati)
const labels = [
    'Gen',
    'Feb',
    'Mar',
    'Apr',
    'Mag',
    'Giu',
    'Lug',
    'Ago',
    'Set',
    'Ott',
    'Nov',
    'Dic',
];

const data = {
    labels: labels,
    datasets: [{
        label: 'Messaggi per mese',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: dati,
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);

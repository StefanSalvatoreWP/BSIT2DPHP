function searchTask() {
    let input = document.getElementById('search').value.toLowerCase();
    let table = document.getElementsByTagName('table')[0];
    let rows = table.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        let rowData = rows[i].getElementsByTagName('td');
        let match = false;

        for (let j = 0; j < rowData.length; j++) {
            let cellData = rowData[j];

            if (cellData) {
                if (cellData.innerHTML.toLowerCase().indexOf(input) > -1) {
                    match = true;
                    break;
                }
            }
        }

        if (match) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}

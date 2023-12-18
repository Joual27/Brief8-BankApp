$(document).ready(function(){
    new DataTable('#users', {
        // 'responsive': true,
        'column' : [
            {data : 'id'},
            {data : 'Username'},
            {data : 'ville'},
            {data : 'Quartier'},
            {data : 'Rue'},
            {data : 'Code Postal'},
            {data : 'Email'},
            {data : 'Phone'}
        ]
        
        

    });
})
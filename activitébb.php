<table>
    <thead>
        <tr>
            <th>Sortie</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Visite au Zoo</td>
            <td>20 décembre 2024</td>
            <td>Zoo de Vincennes</td>
            
    <td><a href="http://localhost:8888/monphp/babyfarm/sortiezoo.php">
        <button type="button">Voir les détails</button>
    </a></td>
</tr>
        <tr>
            <td>Musée des Sciences</td>
            <td>5 janvier 2025</td>
            <td>Cité des Sciences</td>
            <td><a href="http://localhost:8888/monphp/babyfarm/sortiecCiteDesSciences.php">
        <button type="button">Voir les détails</button>
    </a></td>
</tr>
    </tbody>
</table>
<h3>Détails de la sortie : Visite au Zoo</h3>
<p><strong>Date :</strong> 20 décembre 2024</p>
<p><strong>Lieu :</strong> Zoo de Vincennes</p>
<p><strong>Programme :</strong> Découverte des animaux en matinée, déjeuner sur place, activités ludiques l'après-midi.</p>
<p><strong>Accompagnateurs nécessaires :</strong> 5 (2 déjà inscrits)</p>


<style>

/* Style général */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 20px;
    color: #333;
}

h3 {
    color: #2c3e50;
    margin-top: 30px;
}

/* Table de sorties */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

thead {
    background-color: #2c3e50;
    color: #ffffff;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    text-transform: uppercase;
    font-size: 14px;
}

tr:hover {
    background-color: #f1f1f1;
}

button {
    padding: 8px 12px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #2980b9;
}

/* Formulaire d'inscription */
form {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #2c3e50;
}

input[type="text"],
input[type="tel"],
input[type="checkbox"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="checkbox"] {
    width: auto;
    margin-right: 5px;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #27ae60;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #219150;
}

/* Responsive Design */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }

    button {
        font-size: 12px;
    }

    form {
        padding: 15px;
    }
}


    </style>
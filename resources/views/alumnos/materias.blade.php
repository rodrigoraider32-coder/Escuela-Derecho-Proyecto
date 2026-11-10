<?php
// Datos de ejemplo basados en los horarios oficiales de la FES Cuautitlán
$horarios = [
    ["carrera" => "Administración", "semestre" => "1° semestre", "clave" => 1121, "asignatura" => "DERECHO CIVIL Y MERCANTIL", "creditos" => 8, "grupo" => "1101", "aula" => "A6-601", "profesor" => "HEBERTO JAVIER RODRIGUEZ GARCIA", "lunes" => "-", "martes" => "07:00-09:00", "miercoles" => "-", "jueves" => "07:00-09:00", "viernes" => "-", "sabado" => "-"],
    ["carrera" => "Administración", "semestre" => "1° semestre", "clave" => 1121, "asignatura" => "DERECHO CIVIL Y MERCANTIL", "creditos" => 8, "grupo" => "1102", "aula" => "A6-602", "profesor" => "MA. GUADALUPE CONTRERAS ALFARO", "lunes" => "-", "martes" => "07:00-09:00", "miercoles" => "-", "jueves" => "07:00-09:00", "viernes" => "-", "sabado" => "-"],
    ["carrera" => "Administración", "semestre" => "1° semestre", "clave" => 1122, "asignatura" => "DESARROLLO DE HABILIDADES DE LA COMUNICACIÓN ADM", "creditos" => 10, "grupo" => "1101", "aula" => "A6-601", "profesor" => "SANDRO FLORES ALVAREZ", "lunes" => "13:00-15:00", "martes" => "11:00-13:00", "miercoles" => "-", "jueves" => "-", "viernes" => "-", "sabado" => "-"],
    ["carrera" => "Contaduría", "semestre" => "1° semestre", "clave" => 1115, "asignatura" => "CONTABILIDAD BÁSICA", "creditos" => 12, "grupo" => "1111", "aula" => "A7-714", "profesor" => "ELIDA ELIZABETH MARTINEZ FLORES", "lunes" => "07:00-09:00", "martes" => "-", "miercoles" => "07:00-09:00", "jueves" => "-", "viernes" => "07:00-09:00", "sabado" => "-"],
    ["carrera" => "Contaduría", "semestre" => "1° semestre", "clave" => 1116, "asignatura" => "FUNDAMENT. MATEMATS. CIENCIAS ADMVAS.", "creditos" => 10, "grupo" => "1112", "aula" => "A7-715", "profesor" => "HUGO SANCHEZ NAVA", "lunes" => "11:00-13:00", "martes" => "-", "miercoles" => "11:00-13:00", "jueves" => "-", "viernes" => "-", "sabado" => "-"],
    ["carrera" => "Diseño y Comunicación Visual", "semestre" => "1° semestre", "clave" => 150, "asignatura" => "ARTE ANTIGUO", "creditos" => 6, "grupo" => "1101", "aula" => "A2-201", "profesor" => "MARIA DEL CARMEN HERNANDEZ RODRIGUEZ", "lunes" => "11:00-14:00", "martes" => "-", "miercoles" => "-", "jueves" => "-", "viernes" => "-", "sabado" => "-"]
];

// Filtros aplicados desde el formulario
$filtro_carrera = $_GET['carrera'] ?? '';
$filtro_busqueda = strtolower(trim($_GET['q'] ?? ''));

$resultados = array_filter($horarios, function($item) use ($filtro_carrera, $filtro_busqueda) {
    $match_carrera = ($filtro_carrera === '' || $item['carrera'] === $filtro_carrera);
    $match_busqueda = ($filtro_busqueda === '' || 
        strpos(strtolower($item['asignatura']), $filtro_busqueda) !== false || 
        strpos(strtolower($item['profesor']), $filtro_busqueda) !== false ||
        strpos(strtolower($item['clave']), $filtro_busqueda) !== false
    );
    return $match_carrera && $match_busqueda;
});
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horarios FES Cuautitlán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Horarios FES Cuautitlán</h1>
        
        <!-- Formulario de Búsqueda y Filtros -->
        <form method="GET" class="row g-3 mb-4 bg-white p-4 rounded shadow-sm">
            <div class="col-md-4">
                <label for="carrera" class="form-label">Carrera</label>
                <select name="carrera" id="carrera" class="form-select">
                    <option value="">Todas las carreras</option>
                    <option value="Administración" <?= $filtro_carrera == 'Administración' ? 'selected' : '' ?>>Administración</option>
                    <option value="Contaduría" <?= $filtro_carrera == 'Contaduría' ? 'selected' : '' ?>>Contaduría</option>
                    <option value="Diseño y Comunicación Visual" <?= $filtro_carrera == 'Diseño y Comunicación Visual' ? 'selected' : '' ?>>Diseño y Comunicación Visual</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="q" class="form-label">Buscar Asignatura, Profesor o Clave</label>
                <input type="text" name="q" id="q" class="form-control" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" placeholder="Ej. Contabilidad, Hugo Sánchez...">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
        </form>

        <!-- Tabla de Resultados -->
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Carrera</th>
                            <th>Sem.</th>
                            <th>Clave</th>
                            <th>Asignatura</th>
                            <th>Cr.</th>
                            <th>Grupo</th>
                            <th>Aula</th>
                            <th>Profesor</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miércoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($resultados) > 0): ?>
                            <?php foreach ($resultados as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['carrera']) ?></td>
                                    <td><?= htmlspecialchars($row['semestre']) ?></td>
                                    <td><?= htmlspecialchars($row['clave']) ?></td>
                                    <td><strong><?= htmlspecialchars($row['asignatura']) ?></strong></td>
                                    <td><?= htmlspecialchars($row['creditos']) ?></td>
                                    <td><?= htmlspecialchars($row['grupo']) ?></td>
                                    <td><span class="badge bg-secondary"><?= htmlspecialchars($row['aula']) ?></span></td>
                                    <td><?= htmlspecialchars($row['profesor']) ?></td>
                                    <td><?= htmlspecialchars($row['lunes']) ?></td>
                                    <td><?= htmlspecialchars($row['martes']) ?></td>
                                    <td><?= htmlspecialchars($row['miercoles']) ?></td>
                                    <td><?= htmlspecialchars($row['jueves']) ?></td>
                                    <td><?= htmlspecialchars($row['viernes']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="13" class="text-center text-muted py-4">No se encontraron registros con los filtros seleccionados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
header('Content-Type: application/json');
session_start();
require_once __DIR__.'/../inc/conf/db.php';

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $lembrar = isset($_POST['remember']);

    if (!$email || !$senha) $erros[] = "Preencha todos os campos.";

    if (!$erros) {
        $stmt = $pdo->prepare('SELECT id, nome, email, senha FROM usuarios WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $user['nome'];
            $_SESSION['usuario_email'] = $user['email'];

            // Lembrar-me: sessão persiste por 30 dias
            if ($lembrar) {
                setcookie(session_name(), session_id(), time() + 60 * 60 * 24 * 30, "/");
            }

            echo json_encode([
                "success" => true,
                "redirect" => "modules/painel.php"
            ]);
            exit;
        } else {
            $erros[] = "E-mail e/ou senha inválidos.";
        }
    }

    echo json_encode([
        "success" => false,
        "errors" => $erros
    ]);
    exit;
}
echo json_encode([
    "success" => false,
    "errors" => ["Requisição inválida."]
]);
exit;

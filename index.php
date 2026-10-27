
<?php
$usuario = "Administrador";
$data = date("d/m/Y");

$indicadores = [
    ["Usuários cadastrados", "24", "users", "azul"],
    ["Perfis de acesso", "5", "shield", "roxo"],
    ["Registros de auditoria", "128", "activity", "laranja"],
    ["Status do sistema", "Ativo", "check", "verde"]
];

$atividades = [
    ["Novo usuário cadastrado", "Mariana Oliveira foi adicionada ao sistema.", "Há 10 minutos", "MO"],
    ["Perfil atualizado", "As permissões do perfil Professor foram alteradas.", "Há 35 minutos", "PA"],
    ["Acesso realizado", "Um administrador acessou o sistema.", "Há 1 hora", "AC"],
    ["Auditoria registrada", "Uma nova atividade foi registrada no histórico.", "Há 2 horas", "AU"]
];
?>

<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ClassMind | Dashboard</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root {
    --primary: #3157d5;
    --background: #f5f7fb;
    --text: #202b3c;
    --secondary: #64748b;
    --border: #e7ebf2;
    --green: #16a36a;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', Arial, sans-serif;
    color: var(--text);
    background: var(--background);
}

button, a {
    font: inherit;
}

a {
    text-decoration: none;
    color: inherit;
}

.app {
    min-height: 100vh;
}

/* MENU LATERAL */

.sidebar {
    position: fixed;
    inset: 0 auto 0 0;
    width: 245px;
    padding: 28px 18px;
    background: white;
    border-right: 1px solid var(--border);
}

.brand {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0 8px 42px;
}

.brand-icon {
    width: 42px;
    height: 42px;
    display: grid;
    place-items: center;
    border-radius: 13px;
    background: linear-gradient(135deg, #3157d5, #7793ff);
    color: white;
    font-weight: 800;
    font-size: 22px;
}

.brand-name {
    font-size: 22px;
    font-weight: 800;
    letter-spacing: -1px;
}

.brand-name span {
    color: var(--primary);
}

.menu-label {
    margin: 0 12px 12px;
    color: #94a3b8;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.nav {
    display: grid;
    gap: 7px;
}

.nav a {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 13px;
    border-radius: 10px;
    color: var(--secondary);
    font-size: 13px;
    font-weight: 600;
    transition: .2s;
}

.nav a:hover,
.nav a.active {
    background: #edf2ff;
    color: var(--primary);
}

.nav-icon {
    width: 22px;
    text-align: center;
    font-size: 17px;
}

.sidebar-bottom {
    position: absolute;
    bottom: 24px;
    left: 18px;
    right: 18px;
    padding: 16px;
    border: 1px solid var(--border);
    border-radius: 12px;
    background: #fafbfe;
}

.sidebar-bottom strong {
    font-size: 12px;
}

.sidebar-bottom p {
    margin-top: 6px;
    color: var(--secondary);
    font-size: 11px;
    line-height: 1.6;
}

/* CONTEÚDO PRINCIPAL */

.main {
    margin-left: 245px;
    padding: 0 35px 35px;
}

.topbar {
    height: 86px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--border);
    margin-bottom: 34px;
}

.breadcrumb {
    font-size: 12px;
    color: var(--secondary);
}

.breadcrumb strong {
    color: var(--text);
}

.top-user {
    display: flex;
    align-items: center;
    gap: 12px;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: #e0e8ff;
    color: var(--primary);
    font-weight: 800;
    font-size: 13px;
}

.user-info strong {
    display: block;
    font-size: 12px;
}

.user-info span {
    display: block;
    margin-top: 4px;
    font-size: 11px;
    color: var(--secondary);
}

.welcome {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 30px;
}

.eyebrow {
    color: var(--primary);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.welcome h1 {
    font-size: clamp(24px, 3vw, 32px);
    letter-spacing: -1.2px;
    margin-bottom: 10px;
}

.welcome p {
    font-size: 13px;
    color: var(--secondary);
    line-height: 1.7;
}

.date {
    background: white;
    border: 1px solid var(--border);
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 12px;
    white-space: nowrap;
}

/* INDICADORES */

.stats {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 28px;
}

.stat-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 15px;
    padding: 22px;
    box-shadow: 0 4px 18px #1d2b4c08;
    transition: transform .2s, box-shadow .2s;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px #1d2b4c0d;
}

.stat-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}

.stat-title {
    font-size: 12px;
    color: var(--secondary);
    font-weight: 600;
}

.stat-icon {
    width: 39px;
    height: 39px;
    display: grid;
    place-items: center;
    border-radius: 11px;
    font-size: 19px;
}

.azul { background: #edf2ff; color: #3157d5; }
.roxo { background: #f1eaff; color: #8558d8; }
.laranja { background: #fff2df; color: #d58b20; }
.verde { background: #e1f8ed; color: #16a36a; }

.stat-value {
    margin: 22px 0 8px;
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -1px;
}

.stat-description {
    font-size: 11px;
    color: #94a3b8;
}

/* PAINÉIS */

.content-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.6fr) minmax(250px, 1fr);
    gap: 22px;
}

.panel {
    background: white;
    border: 1px solid var(--border);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 18px #1d2b4c08;
}

.panel-header {
    padding: 22px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
}

.panel-header h2 {
    font-size: 15px;
}

.panel-header p {
    font-size: 11px;
    color: var(--secondary);
    margin-top: 6px;
}

.panel-tag {
    color: var(--primary);
    background: #edf2ff;
    border-radius: 7px;
    padding: 7px 10px;
    font-size: 10px;
    font-weight: 700;
}

.activity {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 19px 24px;
    border-bottom: 1px solid #f0f2f7;
}

.activity:last-child {
    border-bottom: none;
}

.activity-avatar {
    flex-shrink: 0;
    width: 38px;
    height: 38px;
    display: grid;
    place-items: center;
    background: #edf2ff;
    color: var(--primary);
    border-radius: 11px;
    font-size: 11px;
    font-weight: 800;
}

.activity-text {
    flex: 1;
}

.activity-text strong {
    font-size: 12px;
    display: block;
    margin-bottom: 6px;
}

.activity-text p {
    font-size: 11px;
    color: var(--secondary);
    line-height: 1.6;
}

.activity-time {
    white-space: nowrap;
    font-size: 10px;
    color: #94a3b8;
    margin-top: 3px;
}

.quick-actions {
    padding: 20px;
    display: grid;
    gap: 11px;
}

.action {
    display: flex;
    align-items: center;
    gap: 13px;
    width: 100%;
    padding: 15px;
    text-align: left;
    border: 1px solid var(--border);
    background: white;
    border-radius: 11px;
    transition: .2s;
}

.action:hover {
    border-color: #b6c6ff;
    background: #f8faff;
    transform: translateX(3px);
}

.action-icon {
    width: 39px;
    height: 39px;
    display: grid;
    place-items: center;
    background: #edf2ff;
    color: var(--primary);
    border-radius: 10px;
    font-size: 18px;
}

.action strong {
    display: block;
    font-size: 12px;
    margin-bottom: 5px;
}

.action span {
    font-size: 10px;
    color: var(--secondary);
}

.action-arrow {
    margin-left: auto;
    color: #94a3b8;
}

.status {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0 20px 20px;
    padding: 13px;
    background: #f0fbf5;
    color: #168353;
    border-radius: 9px;
    font-size: 11px;
    font-weight: 600;
}

.status-dot {
    width: 7px;
    height: 7px;
    background: #16a36a;
    border-radius: 50%;
}

.footer {
    margin-top: 28px;
    text-align: center;
    color: #94a3b8;
    font-size: 10px;
}

/* RESPONSIVIDADE */

@media (max-width: 1100px) {
    .stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .content-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 700px) {
    .sidebar {
        position: static;
        width: 100%;
        height: auto;
        padding: 18px;
        border-right: none;
        border-bottom: 1px solid var(--border);
    }

    .brand {
        margin-bottom: 20px;
    }

    .menu-label,
    .sidebar-bottom {
        display: none;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
    }

    .nav a {
        padding: 10px;
        font-size: 11px;
    }

    .nav-icon {
        display: none;
    }

    .main {
        margin-left: 0;
        padding: 0 16px 24px;
    }

    .topbar {
        height: 72px;
        margin-bottom: 25px;
    }

    .welcome {
        align-items: flex-start;
        flex-direction: column;
    }

    .date {
        white-space: normal;
    }

    .stats {
        gap: 12px;
    }

    .stat-card {
        padding: 16px;
    }

    .stat-title {
        font-size: 11px;
    }

    .stat-value {
        font-size: 25px;
    }

    .activity {
        padding: 16px;
    }

    .activity-time {
        display: none;
    }

    .panel-header {
        padding: 18px;
    }
}

@media (max-width: 390px) {
    .stats {
        grid-template-columns: 1fr;
    }

    .user-info {
        display: none;
    }
}
</style>
</head>

<body>
<div class="app">

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">C</div>
            <div class="brand-name">Class<span>Mind</span></div>
        </div>

        <div class="menu-label">Menu principal</div>

        <nav class="nav">
            <a href="#dashboard" class="active">
                <span class="nav-icon">▦</span>
                Dashboard
            </a>

            <a href="#usuarios">
                <span class="nav-icon">♙</span>
                Usuários
            </a>

            <a href="#perfis">
                <span class="nav-icon">♧</span>
                Perfis e permissões
            </a>

            <a href="#auditoria">
                <span class="nav-icon">◷</span>
                Auditoria
            </a>

            <a href="#configuracoes">
                <span class="nav-icon">⚙</span>
                Configurações
            </a>
        </nav>

        <div class="sidebar-bottom">
            <strong>ClassMind ERP</strong>
            <p>Plataforma de gestão acadêmica<br>Versão demonstrativa · Sprint 1</p>
        </div>
    </aside>

    <main class="main" id="dashboard">

        <header class="topbar">
            <div class="breadcrumb">
                Página inicial &nbsp; / &nbsp;
                <strong>Dashboard</strong>
            </div>

            <div class="top-user">
                <div class="avatar">
                    <?= htmlspecialchars($usuario["iniciais"]) ?>
                </div>

                <div class="user-info">
                    <strong>
                        <?= htmlspecialchars($usuario["nome"]) ?>
                    </strong>
                    <span>
                        <?= htmlspecialchars($usuario["perfil"]) ?>
                    </span>
                </div>
            </div>
        </header>

        <section class="welcome">
            <div>
                <div class="eyebrow">Visão geral</div>
                <h1>Olá, <?= htmlspecialchars($usuario["nome"]) ?>!</h1>
                <p>
                    Aqui está o resumo das principais informações
                    do seu ambiente acadêmico.
                </p>
            </div>

            <div class="date">
                ▦ &nbsp; <?= $data ?>
            </div>
        </section>

        <section class="stats">
            <?php foreach ($indicadores as $item): ?>
                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">
                            <?= htmlspecialchars($item[0]) ?>
                        </span>

                        <div class="stat-icon <?= $item[3] ?>">
                            <?php
                            $icones = [
                                "users" => "♙",
                                "shield" => "⬡",
                                "activity" => "↗",
                                "check" => "✓"
                            ];
                            echo $icones[$item[2]];
                            ?>
                        </div>
                    </div>

                    <div class="stat-value">
                        <?= htmlspecialchars($item[1]) ?>
                    </div>

                    <div class="stat-description">
                        <?php
                        $descricoes = [
                            "users" => "Usuários no sistema",
                            "shield" => "Perfis configurados",
                            "activity" => "Eventos registrados",
                            "check" => "Sistema operacional"
                        ];
                        echo $descricoes[$item[2]];
                        ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="content-grid">

            <div class="panel" id="auditoria">
                <div class="panel-header">
                    <div>
                        <h2>Atividades recentes</h2>
                        <p>Acompanhe os últimos eventos do sistema.</p>
                    </div>

                    <span class="panel-tag">Últimos registros</span>
                </div>

                <?php foreach ($atividades as $atividade): ?>
                    <article class="activity">
                        <div class="activity-avatar">
                            <?= htmlspecialchars($atividade[3]) ?>
                        </div>

                        <div class="activity-text">
                            <strong>
                                <?= htmlspecialchars($atividade[0]) ?>
                            </strong>

                            <p>
                                <?= htmlspecialchars($atividade[1]) ?>
                            </p>
                        </div>

                        <div class="activity-time">
                            <?= htmlspecialchars($atividade[2]) ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="panel">
                <div class="panel-header">
                    <div>
                        <h2>Ações rápidas</h2>
                        <p>Acesse as principais funcionalidades.</p>
                    </div>
                </div>

                <div class="quick-actions">
                    <a href="#usuarios" class="action">
                        <div class="action-icon">＋</div>
                        <div>
                            <strong>Novo usuário</strong>
                            <span>Gerenciar usuários</span>
                        </div>
                        <span class="action-arrow">→</span>
                    </a>

                    <a href="#perfis" class="action">
                        <div class="action-icon">♧</div>
                        <div>
                            <strong>Perfis de acesso</strong>
                            <span>Consultar permissões</span>
                        </div>
                        <span class="action-arrow">→</span>
                    </a>

                    <a href="#auditoria" class="action">
                        <div class="action-icon">◷</div>
                        <div>
                            <strong>Ver auditoria</strong>
                            <span>Consultar atividades</span>
                        </div>
                        <span class="action-arrow">→</span>
                    </a>

                    <a href="#configuracoes" class="action">
                        <div class="action-icon">⚙</div>
                        <div>
                            <strong>Configurações</strong>
                            <span>Preferências do sistema</span>
                        </div>
                        <span class="action-arrow">→</span>
                    </a>
                </div>

                <div class="status">
                    <span class="status-dot"></span>
                    Todos os serviços estão operacionais
                </div>
            </div>

        </section>

        <footer class="footer">
            © <?= date("Y") ?> ClassMind — Sistema de Gestão Acadêmica
        </footer>

    </main>
</div>
</body>
</html>

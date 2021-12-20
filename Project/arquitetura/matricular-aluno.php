<?php

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\AdicionarTelefoneDto;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\AdicionarTelefoneService;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoService;
use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Infra\Repositorio\Eloquent\RepositorioDeAlunoComEloquent;
use Alura\Arquitetura\Infra\Repositorio\Memoria\Aluno\RepositorioDeAlunoEmMemoria;

require 'vendor/autoload.php';
require 'bootstrap/app.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

print_r($argv);

try {
    \DB::beginTransaction();

    $matricularAlunoDto = new MatricularAlunoDto(
        $cpf,
        $nome,
        $email
    );

    $matricularAlunoService = new MatricularAlunoService(new RepositorioDeAlunoComEloquent());
    $matricularAlunoService->executar($matricularAlunoDto);

    $adicionarTelefoneDto = new AdicionarTelefoneDto(
        $cpf,
        $ddd,
        $numero
    );

    $adicionarTelefoneService = new AdicionarTelefoneService(new RepositorioDeAlunoComEloquent);
    $adicionarTelefoneService->executar($adicionarTelefoneDto);

    \DB::commit();
} catch (Exception $e) {
    print_r($e->getMessage());
    \DB::rollBack();
}
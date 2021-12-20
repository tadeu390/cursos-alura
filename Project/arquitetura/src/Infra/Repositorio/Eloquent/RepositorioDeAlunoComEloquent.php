<?php

namespace Alura\Arquitetura\Infra\Repositorio\Eloquent;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoNaoEncontradoException;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Infra\Repositorio\Eloquent\Model\AlunoModel;
use Alura\Arquitetura\Infra\Repositorio\Eloquent\Model\TelefoneModel;

class RepositorioDeAlunoComEloquent implements RepositorioDeAluno
{
    public function adicionar(Aluno $aluno): void
    {
        AlunoModel::create([
            'cpf' => $aluno->cpf(),
            'nome' => $aluno->nome(),
            'email' => $aluno->email()
        ]);
    }

    public function atualizar(Aluno $aluno): void
    {
        $alunoModel = AlunoModel::find($aluno->cpf());

        if (!$alunoModel) {
            throw new AlunoNaoEncontradoException(new Cpf($aluno->cpf()));
        }

        $alunoModel->update([
            'nome' => $aluno->nome(),
            'email' => $aluno->email()
        ]);

        $this->adicionarTelefones($aluno->cpf(), $aluno->telefones());
    }

    public function adicionarTelefones($cpfAluno, $telefones): void
    {
        $alunoModel = AlunoModel::find($cpfAluno);

        if (!$alunoModel) {
            throw new AlunoNaoEncontradoException(new Cpf($cpfAluno));
        }

        foreach ($telefones as $telefone) {
            TelefoneModel::firstOrNew([
                'cpf_aluno' => $cpfAluno,
                'ddd' => $telefone->ddd(),
                'numero' => $telefone->numero(),
            ])->save();
        }
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $alunoModel = AlunoModel::query()
            ->with(['telefones'])
            ->where('cpf', $cpf)->first();

        if (!$alunoModel) {
            throw new AlunoNaoEncontradoException($cpf);
        }

        $aluno = Aluno::comCpfNomeEEmail($alunoModel->cpf, $alunoModel->nome, $alunoModel->email);

        foreach ($alunoModel->telefones as $telefone) {
            $aluno->adicionarTelefone($telefone->ddd, $telefone->numero);
        }

        return $aluno;
    }

    public function buscarTodos(): array
    {
        $sql = '
            SELECT cpf, nome, email, ddd, numero as numero_telefone
              FROM alunos
         LEFT JOIN telefones ON telefones.cpf_aluno = alunos.cpf;
        ';
        $stmt = $this->conexao->query($sql);

        $listaDadosAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $alunos = [];

        foreach ($listaDadosAlunos as $dadosAluno) {
            if (!array_key_exists($dadosAluno['cpf'], $alunos)) {
                $alunos[$dadosAluno['cpf']] = Aluno::comCpfNomeEEmail(
                    $dadosAluno['cpf'],
                    $dadosAluno['nome'],
                    $dadosAluno['email']
                );
            }

            $alunos[$dadosAluno['cpf']]->adicionarTelefone($dadosAluno['ddd'], $dadosAluno['numero_telefone']);
        }

        return array_values($alunos);
    }
}

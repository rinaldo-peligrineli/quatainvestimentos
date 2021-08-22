<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
Use Log;

use App\Model\Usuario\NivelAcesso;
use App\Model\Usuario\Usuario;

class CriarArquivo implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    protected $usuario;
    protected $acao;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($usuario, $acao)
    {
        $this->usuario = $usuario;
        $this->acao = $acao;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        try {
            $usuario = $this->usuario;
            $acao = $this->acao;
            $dirPath = public_path() . "/usuarios/" . $usuario->created_at->format('Y-m') . '/' . $usuario->id;
            $filePath = $dirPath . "/dados.txt";

            $strHeader = 'id;nome_usuario;emai;senha;status;nivel_acesso;observacoes;data_criacao;data_atualizacao;acao' . PHP_EOL;
            $strContents =  $usuario->id . ';' . $usuario->nome_usuario . ';' . $usuario->email . ';' . $usuario->senha . ';' . $usuario->status . ';';
            $strContents .=  $usuario->nivelAcesso->nivel_acesso . ';' . $usuario->obervacoes . ';' . $usuario->created_at->format('Ymd') . ';' . $usuario->updated_at->format('Ymd') . ';' . $acao. PHP_EOL;
            
            if (!is_dir($dirPath)) {
                mkdir($dirPath, 0777, true);
                $fp = fopen($filePath, 'a');
                fwrite($fp, $strHeader.$strContents);
                fclose($fp);
            } else {
                $fp = fopen($filePath, 'a');
                fwrite($fp, $strContents);
                fclose($fp);
            }
        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }
}

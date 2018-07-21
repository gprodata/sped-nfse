<?php

namespace NFePHP\NFSe\Models\Infisc\Factories;

use NFePHP\NFSe\Models\Infisc\Factories\Header;
use NFePHP\NFSe\Models\Infisc\Factories\Factory;

class ConsultarSituacaoLoteRps extends Factory
{
    public function render(
        $versao,
        $remetenteTipoDoc,
        $remetenteCNPJCPF,
        $inscricaoMunicipal,
        $protocolo
    ) {
        $method = "ConsultarSituacaoLoteRpsEnvio";
        $xsd = 'servico_consultar_situacao_lote_rps_envio';
        $content = $this->requestFirstPart($method, $xsd);
        $content .= Header::render($remetenteTipoDoc, $remetenteCNPJCPF, $inscricaoMunicipal);
        $content .= "<Protocolo>$protocolo</Protocolo>";
        $content .= "</$method>";
        $body = $this->clear($content);
        $this->validar($versao, $body, 'Infisc', $xsd, '');
        return $body;
    }
}

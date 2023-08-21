<?php

declare(strict_types=1);

namespace App\Model;

class Noticia
{
    const TABLE = 'noticias';
    const ID = 'id';
    const LINK = 'link';
    const TITULO = 'titulo';
    const DATA = 'data';
    const SITE = 'site';
    const LOGO_SITE = 'logo_site';
    const FOTO = 'foto';

    public readonly int $id;
    public readonly string $link;
    public readonly string $titulo;
    public readonly string $data;
    public readonly string $site;
    public readonly string $logoSite;
    public readonly string $foto;

    public function __construct(
        int $id,
        string $link,
        string $titulo,
        string $data,
        string $site,
        string $logoSite,
        string $foto,
    ) {
        $this->id = $id;
        $this->link = $link;
        $this->titulo = $titulo;
        $this->data = $data;
        $this->site = $site;
        $this->logoSite = $logoSite;
        $this->foto = $foto;
    }

    static function fromArray(array $array): Noticia
    {
        return new Noticia(
            id: $array[self::ID],
            link: $array[self::LINK],
            titulo: $array[self::TITULO],
            data: $array[self::DATA],
            site: $array[self::SITE],
            logoSite: $array[self::LOGO_SITE],
            foto: $array[self::FOTO],
        );
    }

    function toArray(): array
    {
        return [
            self::ID => $this->id,
            self::LINK => $this->link,
            self::TITULO => $this->titulo,
            self::DATA => $this->data,
            self::SITE => $this->site,
            self::LOGO_SITE => $this->logoSite,
            self::FOTO => $this->foto,
        ];
    }
}

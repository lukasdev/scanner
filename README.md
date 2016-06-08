# URL Scanner

Escaneia uma url e reporta urls inacessiveis (repositório teste)

## Install

Via Composer

``` bash
$ composer require lukasdev/scanner
```

## Usage

``` php
$urls = [
    'http://www.apple.com',
    'http://php.net',
    'http://sdfssdwerw.org'
];
$scanner = new \LukasDev\ModernPHP\Url\Scanner($urls);
print_r($scanner->getInvalidUrls());
```

## Testing

Tests não disponíveis.

## Contributing

Por favor veja [CONTRIBUTING](CONTRIBUTING.md) para detalhes.

## Credits

- [Lucas Silva](https://github.com/lukasdev)
- [All Contributors](https://github.com/lukasdev/scanner/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

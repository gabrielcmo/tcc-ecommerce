<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'client',
        ]);

        DB::table('cupons')->insert([
            'name' => 'TOGURO',
            'fornecido_por' => 'TOGURO',
            'desconto' => 10,
        ]);

        DB::table('roles')->insert([
            'name' => 'employee',
        ]);

        DB::table('users')->insert([
            'name' => 'Cliente',
            'email' => 'cliente'.'@doomus.com',
            'password' => bcrypt('secret'),
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Gabriel',
            'email' => 'gabriel'.'@doomus.com',
            'cep' => 13835000,
            'bairro' => 'Centro',
            'cidade' => 'Conchal',
            'estado' => 'SP',
            'endereco' => 'Cons. Rodrigues Alves',
            'numero' => 17,
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Geovanne',
            'email' => 'geovanne'.'@doomus.com',
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Banheiro'
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Cozinha'
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Jardinagem'
        ]);

        DB::table('categories')->insert([
            'name' => 'Quarto'
        ]);

        DB::table('categories')->insert([
            'name' => 'Sala'
        ]);
        
        DB::table('payment_methods')->insert([
            'name' => 'Paypal',
        ]);

        DB::table('products')->insert([
            'name' => 'Cesto de roupa',
            'description' => 'Com ótima capacidade, é perfeita para guardar suas roupas até a lavagem. Com resistência e material duradouro é uma ótima opção de custo/benefício',
            'qtd_last' => 20,
            'weight' => 120.0,
            'lenght' => 20.3,
            'width' => 40.0,
            'height' => 20.0,
            'discount' => 0.2,
            'diameter' => 80.0,
            'price' => 9.99,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Chuveiro',
            'description' => 'Com resistência de 200w e potência forte, te aquece no frio e te refresca no calor. Excelente preço no mercado.',
            'qtd_last' => 8,
            'weight' => 800.0,
            'lenght' => 30.0,
            'width' => 36.4,
            'height' => 10.5,
            'discount' => 0.2,
            'diameter' => 40.0,
            'price' => 49.99,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Torneira',
            'description' => 'Excelente para lavar seus pratos, copos, talheres e etc. Tem comprimento excelente para quem deseja praticidade e rapidez depois de uma refeição.',
            'qtd_last' => 40,
            'weight' => 250.3,
            'lenght' => 2.0,
            'width' => 5.0,
            'discount' => 0.2,
            'height' => 30.0,
            'diameter' => 100.0,
            'price' => 29.98,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Lixo',
            'description' => 'Com volume ótimo para armazenar sujeira e lixo, é discreto para escritórios e salas formais',
            'qtd_last' => 100,
            'weight' => 150.0,
            'lenght' => 30.5,
            'width' => 30.5,
            'height' => 45.2,
            'diameter' => 70.8,
            'price' => 12.97,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Armário de banheiro',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 34,
            'weight' => 1000.0,
            'lenght' => 10.9,
            'width' => 40.0,
            'height' => 60.0,
            'diameter' => 100.0,
            'price' => 79.88,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Saboneteira',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 70,
            'weight' => 100.0,
            'lenght' => 3.7,
            'width' => 8.0,
            'height' => 2.0,
            'diameter' => 8.0,
            'price' => 8.99,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Suporte de toalha',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 26,
            'weight' => 90.0,
            'lenght' => 2.0,
            'width' => 50.0,
            'height' => 2.0,
            'diameter' => 60.0,
            'price' => 14.88,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Pia',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 43,
            'weight' => 500.0,
            'lenght' => 20.6,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 72.5,
            'price' => 49.66,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Jogo de copos',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 29,
            'weight' => 120.0,
            'lenght' => 10.0,
            'width' => 10.0,
            'discount' => 0.4,
            'height' => 15.0,
            'diameter' => 12.0,
            'price' => 23.94,
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Kit de panelas',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 20,
            'weight' => 280.0,
            'lenght' => 16.3,
            'width' => 12.0,
            'discount' => 0.4,
            'height' => 12.0,
            'diameter' => 32.9,
            'price' => 38.98,
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Torradeira',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 12,
            'weight' => 144.5,
            'lenght' => 10.2,
            'width' => 20.4,
            'discount' => 0.4,
            'height' => 8.2,
            'diameter' => 15.0,
            'price' => 27.69,
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Tábua de corte',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Kit de taças',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Coifa',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Cooktop',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Geladeira',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 2,
        ]);

        DB::table('products')->insert([
            'name' => 'Regador',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'discount' => 0.5,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Vaso',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'discount' => 0.5,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Kit horta',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Serrote',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Luvas',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Kit de jardinagem',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Pulverizador',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Vassoura',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Ar condicionado',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'discount' => 0.1,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'TV 32"',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'discount' => 0.1,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Cobertor',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Edredom',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Travesseiro',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Cama',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Guarda roupa',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Armário de quarto',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 4,
        ]);

        DB::table('products')->insert([
            'name' => 'Espelho',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Quadro',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Tapete',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'discount' => 0.3,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Estante de livros',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'discount' => 0.3,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Poltrona',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Mesa de apoio',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Mesa de centro',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Sofá',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 5,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'banheiro/cesto_de_roupa.jpg',
            'product_id' => 1,
        ]);
        DB::table('product_images')->insert([
            'filename' => 'banheiro/cesto_de_roupa2.jpg',
            'product_id' => 1,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'banheiro/chuveiro.jpg',
            'product_id' => 2,
        ]);
        DB::table('product_images')->insert([
            'filename' => 'banheiro/chuveiro2.jpg',
            'product_id' => 2,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'banheiro/torneira.jpg',
            'product_id' => 3,
        ]);
        DB::table('product_images')->insert([
            'filename' => 'banheiro/torneira2.jpg',
            'product_id' => 3,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'banheiro/lixo.jpg',
            'product_id' => 4,
        ]);
        DB::table('product_images')->insert([
            'filename' => 'banheiro/lixo2.jpg',
            'product_id' => 4,
        ]);
        DB::table('product_images')->insert([
            'filename' => 'banheiro/lixo3.jpg',
            'product_id' => 4,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'banheiro/armario_banheiro.jpg',
            'product_id' => 5,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'banheiro/saboneteira.jpg',
            'product_id' => 6
        ]);
        DB::table('product_images')->insert([
            'filename' => 'banheiro/saboneteira2.jpg',
            'product_id' => 6
        ]);

        DB::table('product_images')->insert([
            'filename' => 'banheiro/suporte_de_toalha.jpg',
            'product_id' => 7
        ]);

        DB::table('product_images')->insert([
            'filename' => 'banheiro/pia.jpg',
            'product_id' => 8
        ]);
        DB::table('product_images')->insert([
            'filename' => 'banheiro/pia2.jpg',
            'product_id' => 8
        ]);

        DB::table('product_images')->insert([
            'filename' => 'cozinha/jogo_de_copos.jpg',
            'product_id' => 9
        ]);
        DB::table('product_images')->insert([
            'filename' => 'cozinha/jogo_de_copos2.jpg',
            'product_id' => 9
        ]);
        
        DB::table('product_images')->insert([
            'filename' => 'cozinha/kit_de_panelas.jpg',
            'product_id' => 10
        ]);
        DB::table('product_images')->insert([
            'filename' => 'cozinha/kit_de_panelas2.jpg',
            'product_id' => 10
        ]);

        DB::table('product_images')->insert([
            'filename' => 'cozinha/torradeira.jpg',
            'product_id' => 11
        ]);
        DB::table('product_images')->insert([
            'filename' => 'cozinha/torradeira2.jpg',
            'product_id' => 11
        ]);

        DB::table('product_images')->insert([
            'filename' => 'cozinha/tabua_de_corte.jpg',
            'product_id' => 12
        ]);
        DB::table('product_images')->insert([
            'filename' => 'cozinha/tabua_de_corte2.jpg',
            'product_id' => 12
        ]);

        DB::table('product_images')->insert([
            'filename' => 'cozinha/kit_de_tacas.jpg',
            'product_id' => 13
        ]);
        DB::table('product_images')->insert([
            'filename' => 'cozinha/kit_de_tacas2.jpg',
            'product_id' => 13
        ]);

        DB::table('product_images')->insert([
            'filename' => 'cozinha/coifa.jpg',
            'product_id' => 14
        ]);
        DB::table('product_images')->insert([
            'filename' => 'cozinha/coifa2.jpg',
            'product_id' => 14
        ]);

        DB::table('product_images')->insert([
            'filename' => 'cozinha/cooktop.jpg',
            'product_id' => 15
        ]);
        DB::table('product_images')->insert([
            'filename' => 'cozinha/cooktop2.jpg',
            'product_id' => 15
        ]);
        
        DB::table('product_images')->insert([
            'filename' => 'cozinha/geladeira.jpg',
            'product_id' => 16
        ]);
        DB::table('product_images')->insert([
            'filename' => 'cozinha/geladeira2.jpg',
            'product_id' => 16
        ]);

        DB::table('product_images')->insert([
            'filename' => 'jardinagem/regador.jpg',
            'product_id' => 17
        ]);
        DB::table('product_images')->insert([
            'filename' => 'jardinagem/regador2.jpg',
            'product_id' => 17
        ]);

        DB::table('product_images')->insert([
            'filename' => 'jardinagem/vaso.jpg',
            'product_id' => 18
        ]);
        DB::table('product_images')->insert([
            'filename' => 'jardinagem/vaso2.jpg',
            'product_id' => 18
        ]);

        DB::table('product_images')->insert([
            'filename' => 'jardinagem/kit_horta.jpg',
            'product_id' => 19
        ]);
        DB::table('product_images')->insert([
            'filename' => 'jardinagem/kit_horta2.jpg',
            'product_id' => 19
        ]);

        DB::table('product_images')->insert([
            'filename' => 'jardinagem/serrote.jpg',
            'product_id' => 20
        ]);

        DB::table('product_images')->insert([
            'filename' => 'jardinagem/luvas.jpg',
            'product_id' => 21
        ]);
        DB::table('product_images')->insert([
            'filename' => 'jardinagem/luvas2.jpg',
            'product_id' => 21
        ]);

        DB::table('product_images')->insert([
            'filename' => 'jardinagem/kit_de_jardinagem.jpg',
            'product_id' => 22
        ]);

        DB::table('product_images')->insert([
            'filename' => 'jardinagem/pulverizador.jpg',
            'product_id' => 23
        ]);
        DB::table('product_images')->insert([
            'filename' => 'jardinagem/pulverizador2.jpg',
            'product_id' => 23
        ]);

        DB::table('product_images')->insert([
            'filename' => 'jardinagem/vassoura.jpg',
            'product_id' => 24
        ]);
        DB::table('product_images')->insert([
            'filename' => 'jardinagem/vassoura2.jpg',
            'product_id' => 24 
        ]);

        DB::table('product_images')->insert([
            'filename' => 'quarto/ar_condicionado.jpg',
            'product_id' => 25
        ]);
        DB::table('product_images')->insert([
            'filename' => 'quarto/ar_condicionado2.jpg',
            'product_id' => 25
        ]);

        DB::table('product_images')->insert([
            'filename' => 'quarto/tv.jpg',
            'product_id' => 26
        ]);
        DB::table('product_images')->insert([
            'filename' => 'quarto/tv2.jpg',
            'product_id' => 26
        ]);

        DB::table('product_images')->insert([
            'filename' => 'quarto/cobertor.jpg',
            'product_id' => 27
        ]);

        DB::table('product_images')->insert([
            'filename' => 'quarto/edredom.jpg',
            'product_id' => 28
        ]);
        DB::table('product_images')->insert([
            'filename' => 'quarto/edredom2.jpg',
            'product_id' => 28
        ]);

        DB::table('product_images')->insert([
            'filename' => 'quarto/travesseiro.jpg',
            'product_id' => 29
        ]);
        DB::table('product_images')->insert([
            'filename' => 'quarto/travesseiro2.jpg',
            'product_id' => 29
        ]);

        DB::table('product_images')->insert([
            'filename' => 'quarto/cama.jpg',
            'product_id' => 30
        ]);
        DB::table('product_images')->insert([
            'filename' => 'quarto/cama2.jpg',
            'product_id' => 30
        ]);

        DB::table('product_images')->insert([
            'filename' => 'quarto/guarda_roupa.jpg',
            'product_id' => 31
        ]);
        DB::table('product_images')->insert([
            'filename' => 'quarto/guarda_roupa2.jpg',
            'product_id' => 31
        ]);

        DB::table('product_images')->insert([
            'filename' => 'quarto/armario_quarto.jpg',
            'product_id' => 32
        ]);
        DB::table('product_images')->insert([
            'filename' => 'quarto/armario2_quarto.jpg',
            'product_id' => 32
        ]);

        DB::table('product_images')->insert([
            'filename' => 'sala/espelho.jpg',
            'product_id' => 33
        ]);
        DB::table('product_images')->insert([
            'filename' => 'sala/espelho2.jpg',
            'product_id' => 33
        ]);

        DB::table('product_images')->insert([
            'filename' => 'sala/quadro.jpg',
            'product_id' => 34
        ]);
        
        DB::table('product_images')->insert([
            'filename' => 'sala/tapete.jpg',
            'product_id' => 35
        ]);

        DB::table('product_images')->insert([
            'filename' => 'sala/estante_de_livros.jpg',
            'product_id' => 36
        ]);
        DB::table('product_images')->insert([
            'filename' => 'sala/estante_de_livros2.jpg',
            'product_id' => 36
        ]);

        DB::table('product_images')->insert([
            'filename' => 'sala/poltrona.jpg',
            'product_id' => 37 
        ]);
        DB::table('product_images')->insert([
            'filename' => 'sala/poltrona2.jpg',
            'product_id' => 37
        ]);

        DB::table('product_images')->insert([
            'filename' => 'sala/mesa_de_apoio.jpg',
            'product_id' => 38
        ]);

        DB::table('product_images')->insert([
            'filename' => 'sala/mesa_de_centro.jpg',
            'product_id' => 39
        ]);
        DB::table('product_images')->insert([
            'filename' => 'sala/mesa_de_centro2.jpg',
            'product_id' => 39
        ]);

        DB::table('product_images')->insert([
            'filename' => 'sala/sofa.jpg',
            'product_id' => 40
        ]);
        DB::table('product_images')->insert([
            'filename' => 'sala/sofa2.jpg',
            'product_id' => 40
        ]);



        DB::table('order_statuses')->insert([
            'name' => 'Processando pagamento',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Pagamento aprovado',
        ]);
        
        DB::table('order_statuses')->insert([
            'name' => 'Em transporte',
        ]);
        
        DB::table('order_statuses')->insert([
            'name' => 'Entregue',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Cancelado',
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 1,
            'status_id' => 4,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'data_aprovado' => date('Y-m-d')." ".date('H:i:s'),
            'data_despache' => date('Y-m-d')." ".date('H:i:s'),
            'data_entrega' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 200,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'status_id' => 4,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'data_aprovado' => date('Y-m-d')." ".date('H:i:s'),
            'data_despache' => date('Y-m-d')." ".date('H:i:s'),
            'data_entrega' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 200,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'status_id' => 5,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'data_aprovado' => date('Y-m-d')." ".date('H:i:s'),
            'data_despache' => date('Y-m-d')." ".date('H:i:s'),
            'data_cancelado' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 35,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'status_id' => 2,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'data_aprovado' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 341,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'status_id' => 1,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 75,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 1,
            'qty' => 2,
            'price' => 133
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 2,
            'order_id' => 1,
            'qty' => 4,
            'price' => 20
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 2,
            'qty' => 2,
            'price' => 133
        ]);

        DB::table('order_product')->insert([
            'product_id' => 7,
            'order_id' => 3,
            'qty' => 1,
            'price' => 133
        ]);

        DB::table('order_product')->insert([
            'product_id' => 6,
            'order_id' => 3,
            'qty' => 5,
            'price' => 53
        ]);

        DB::table('order_product')->insert([
            'product_id' => 2,
            'order_id' => 4,
            'qty' => 7,
            'price' => 13
        ]);

        DB::table('order_product')->insert([
            'product_id' => 5,
            'order_id' => 3,
            'qty' => 1,
            'price' => 30
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 3,
            'qty' => 1,
            'price' => 120
        ]);

        DB::table('order_product')->insert([
            'product_id' => 8,
            'order_id' => 5,
            'qty' => 10,
            'price' => 19.99
        ]);
        
        DB::table('ticket_types')->insert([
            'name' => 'Problemas com algum pedido'
        ]);

        DB::table('ticket_types')->insert([
            'name' => 'Problemas técnicos'
        ]);

        DB::table('ticket_types')->insert([
            'name' => 'Problemas ao confirmar a compra'
        ]);

        DB::table('tickets')->insert([
            'message' => 'Não consigo logar',
            'status' => 0,
            'ticket_type_id' => 2,
            'creation_date' => new DateTime(),
            'subject' => 'Socorro',
            'user_id' => 2,
        ]);

        DB::table('tickets')->insert([
            'message' => 'Meu pedido não chegouuu!!',
            'status' => 0,
            'ticket_type_id' => 1,
            'creation_date' => new DateTime(),
            'subject' => 'Me ajuda',
            'user_id' => 3,
        ]);
    }
}
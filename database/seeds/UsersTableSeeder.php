<?php

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $profile = new Profile();
        $adminRole = Role::whereName('Admin')->first();
        $userRole = Role::whereName('User')->first();



        // Admins

        $seededAdminEmail = 'flo@flo.flo';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name'                           => 'administrator',
                'first_name'                     => $faker->firstName,
                'last_name'                      => $faker->lastName,
                'email'                          => $seededAdminEmail,
                'password'                       => Hash::make('vivelardeche07'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_confirmation_ip_address' => $faker->ipv4,
                'admin_ip_address'               => $faker->ipv4,
            ]);

            $user->profile()->save($profile);
            $user->attachRole($adminRole);
            $user->save();
        }

        // Admins

        $florentadmEmail = 'me@florentfeougier.com';
        $user = User::where('email', '=', $florentadmEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name'                           => 'florentadm',
                'first_name'                     => 'Florent',
                'last_name'                      => 'Feougier',
                'email'                          => $florentadmEmail,
                'password'                       => "$2y\$10\$3.Uo09gd8RtRWubScXPerOwT15UrczN8rWEH8M/5dcgFuC3Y27s12",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_confirmation_ip_address' => "77.144.171.144",
                'admin_ip_address'               => "77.144.171.144",
            ]);

            $user->profile()->save($profile);
            $user->attachRole($adminRole);
            $user->save();
        }







        // Florent test user
        $florent = User::where('email', '=', 'michelearnaud@gmail.com')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'michelearnaud',
                'first_name'                     => 'Michele',
                'last_name'                      => 'Arnaud',
                'email'                          => 'michelearnaud@gmail.com',
                'password'                       => "$2y$10\$e91oNZgtvow2Hc1Qaarw1.yJdMRmceXGJmL8r2y6bO7GMcboPsI5m",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "78.211.17.182",
                'signup_confirmation_ip_address' => "78.211.17.182",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }

                        // Florent test user
                        $florent = User::where('email', '=', 'libouroux.fanny@gmail.com')->first();
                        if ($florent === null) {
                            $florent = User::create([
                                'name'                           => 'fannylibouroux',
                                'first_name'                     => 'Fanny',
                                'last_name'                      => 'Libouroux',
                                'email'                          => 'libouroux.fanny@gmail.com',
                                'password'                       => "$2y$10\$oOIOfZNSYVFtnMfYJO1EN.IbvtA54t5P/aKiH1xEDHprmtNM6.G5m",
                                'token'                          => str_random(64),
                                'activated'                      => true,
                                'signup_ip_address'              => "78.211.17.182",
                                'signup_confirmation_ip_address' => "78.211.17.182",
                            ]);

                            $florent->profile()->save(new Profile());
                            $florent->attachRole($userRole);
                            $florent->save();
                        }

                // Florent test user
                $florent = User::where('email', '=', 'absfrenchy@gmail.com')->first();
                if ($florent === null) {
                    $florent = User::create([
                        'name'                           => 'absfrench',
                        'first_name'                     => 'Absfrench',
                        'last_name'                      => '',
                        'email'                          => 'absfrenchy@gmail.com',
                        'password'                       => "$2y$10\$oOIOfZNSYVFtnMfYJO1EN.IbvtA54t5P/aKiH1xEDHprmtNM6.G5m",
                        'token'                          => str_random(64),
                        'activated'                      => true,
                        'signup_ip_address'              => "78.211.17.182",
                        'signup_confirmation_ip_address' => "78.211.17.182",
                    ]);

                    $florent->profile()->save(new Profile());
                    $florent->attachRole($userRole);
                    $florent->save();
                }


        // Florent test user
        $florent = User::where('email', '=', 'laila.samaali973@gmail.com')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'laila',
                'first_name'                     => 'Laila',
                'last_name'                      => '',
                'email'                          => 'laila.samaali973@gmail.com',
                'password'                       => "$2y$10\$oOIOfZNSYVFtnMfYJO1EN.IbvtA54t5P/aKiH1xEDHprmtNM6.G5m",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "78.211.17.182",
                'signup_confirmation_ip_address' => "78.211.17.182",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }

        // Florent test user
        $florent = User::where('email', '=', 'maargault@live.be')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'margault',
                'first_name'                     => 'Margault',
                'last_name'                      => '',
                'email'                          => 'maargault@live.be',
                'password'                       => "$2y$10\$MW1sPlE0iEuzfGf05oZyXuIlLPG0a9Qw59HHkUpGuLXDFXaTxrp.y",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "78.211.17.182",
                'signup_confirmation_ip_address' => "78.211.17.182",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }

        // Florent test user
        $florent = User::where('email', '=', 'marine.caron.epl14@gmail.com')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'marinecarron',
                'first_name'                     => 'Marine',
                'last_name'                      => 'Caron',
                'email'                          => 'marine.caron.epl14@gmail.com',
                'password'                       => "$2y$10\$ooQWLwDwZlig/yg8IsW2we4vw12oVjW.i5EauKCeUecMQQC7WR1YG",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "78.211.17.182",
                'signup_confirmation_ip_address' => "78.211.17.182",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }
        // Florent test user
        $florent = User::where('email', '=', 'jessica.buache@gmail.com')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'jessicabuache',
                'first_name'                     => 'Jessica',
                'last_name'                      => 'Buache',
                'email'                          => 'jessica.buache@gmail.com',
                'password'                       => "$2y$10\$FxTbqTsLep5hgfDDpMPZuOVFAv4/V.7.lTlyhP4cqxp6M1tw1a21W",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "78.211.17.182",
                'signup_confirmation_ip_address' => "78.211.17.182",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }

        // Florent test user
        $florent = User::where('email', '=', 'julie.battut@live.fr')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'juliebattut',
                'first_name'                     => 'Julie',
                'last_name'                      => 'Battut',
                'email'                          => 'julie.battut@live.fr',
                'password'                       => "$2y$10\$FxTbqTsLep5hgfDDpMPZuOVFAv4/V.7.lTlyhP4cqxp6M1tw1a21W",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "78.211.17.182",
                'signup_confirmation_ip_address' => "78.211.17.182",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }


                        // Florent test user
                        $florent = User::where('email', '=', 'fr.aucler@gmail.com')->first();
                        if ($florent === null) {
                            $florent = User::create([
                                'name'                           => 'francoisecherland',
                                'first_name'                     => 'Françoise',
                                'last_name'                      => 'Cherland',
                                'email'                          => 'fr.aucler@gmail.com',
                                'password'                       => "$2y$10\$Sm0yJykBB0MI5fo5AAPtguFr/jZYfbfQdMGQ34T/DGvI5T.HF8g8S",
                                'token'                          => str_random(64),
                                'activated'                      => true,
                                'signup_ip_address'              => "78.211.17.182",
                                'signup_confirmation_ip_address' => "78.211.17.182",
                            ]);

                            $florent->profile()->save(new Profile());
                            $florent->attachRole($userRole);
                            $florent->save();
                        }


                // Florent test user
                $florent = User::where('email', '=', 'ophelie.barbou@outlook.fr')->first();
                if ($florent === null) {
                    $florent = User::create([
                        'name'                           => 'ophelie',
                        'first_name'                     => 'Ophelie',
                        'last_name'                      => 'Barbou',
                        'email'                          => 'ophelie.barbou@outlook.fr',
                        'password'                       => "$2y$10\$Sm0yJykBB0MI5fo5AAPtguFr/jZYfbfQdMGQ34T/DGvI5T.HF8g8S",
                        'token'                          => str_random(64),
                        'activated'                      => true,
                        'signup_ip_address'              => "78.211.17.182",
                        'signup_confirmation_ip_address' => "78.211.17.182",
                    ]);

                    $florent->profile()->save(new Profile());
                    $florent->attachRole($userRole);
                    $florent->save();
                }

        // Florent test user
        $florent = User::where('email', '=', 'manoune_7854@hotmail.fr')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'manoune',
                'first_name'                     => 'Manon',
                'last_name'                      => 'Lola',
                'email'                          => 'manoune_7854@hotmail.fr',
                'password'                       => Hash::make('LMCVG07BC'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "93.1.114.247",
                'signup_confirmation_ip_address' => "93.1.114.247",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }

        // Florent test user
        $florent = User::where('email', '=', 'mylinh.ngd@gmail.com')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'mylinh',
                'first_name'                     => 'Mylinh',
                'last_name'                      => '',
                'email'                          => 'mylinh.ngd@gmail.com',
                'password'                       => Hash::make('LMCVG07BC'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "93.1.114.247",
                'signup_confirmation_ip_address' => "93.1.114.247",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }



                // Florent test user
                $florent = User::where('email', '=', 'zoedolla22@gmail.com')->first();
                if ($florent === null) {
                    $florent = User::create([
                        'name'                           => 'zoedolla',
                        'first_name'                     => 'Zoe',
                        'last_name'                      => '',
                        'email'                          => 'zoedolla22@gmail.com',
                        'password'                       => Hash::make('LMCVG07BC'),
                        'token'                          => str_random(64),
                        'activated'                      => true,
                        'signup_ip_address'              => "93.1.114.247",
                        'signup_confirmation_ip_address' => "93.1.114.247",
                    ]);

                    $florent->profile()->save(new Profile());
                    $florent->attachRole($userRole);
                    $florent->save();
                }




                // Florent test user
                $florent = User::where('email', '=', 'martinajulie.mj@gmail.com')->first();
                if ($florent === null) {
                    $florent = User::create([
                        'name'                           => 'martinajulie',
                        'first_name'                     => 'Julie',
                        'last_name'                      => 'Martina',
                        'email'                          => 'martinajulie.mj@gmail.com',
                        'password'                       => Hash::make('LMCVG07BC'),
                        'token'                          => str_random(64),
                        'activated'                      => true,
                        'signup_ip_address'              => "86.227.121.149",
                        'signup_confirmation_ip_address' => "86.227.121.149",
                    ]);

                    $florent->profile()->save(new Profile());
                    $florent->attachRole($userRole);
                    $florent->save();
                }



        // Florent test user
        $florent = User::where('email', '=', 'bertuol.amandine@hotmail.fr')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'amandine',
                'first_name'                     => 'Amandine',
                'last_name'                      => 'Bertuol',
                'email'                          => 'bertuol.amandine@hotmail.fr',
                'password'                       => Hash::make('LMCVG07BC'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "86.227.121.149",
                'signup_confirmation_ip_address' => "86.227.121.149",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }

        // Florent test user
        $florent = User::where('email', '=', 'nathansouch@gmail.com')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'nathansouch',
                'first_name'                     => 'Nathan',
                'last_name'                      => 'Souch',
                'email'                          => 'nathansouch@gmail.com',
                'password'                       => Hash::make('LMCVG07BC'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "77.144.11.144",
                'signup_confirmation_ip_address' => "77.144.11.144",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }

                // Florent test user
                $florent = User::where('email', '=', 'manon.benbark19@gmail.com')->first();
                if ($florent === null) {
                    $florent = User::create([
                        'name'                           => 'manonbenbark',
                        'first_name'                     => 'Manon',
                        'last_name'                      => 'Benbark',
                        'email'                          => 'manon.benbark19@gmail.com',
                        'password'                       => Hash::make('LMCVG07BC'),
                        'token'                          => str_random(64),
                        'activated'                      => true,
                        'signup_ip_address'              => "77.144.171.144",
                        'signup_confirmation_ip_address' => "77.144.171.144",
                    ]);

                    $florent->profile()->save(new Profile());
                    $florent->attachRole($userRole);
                    $florent->save();
                }


        // Florent test user
        $florent = User::where('email', '=', 'flofgr@pm.me')->first();
        if ($florent === null) {
            $florent = User::create([
                'name'                           => 'florent',
                'first_name'                     => 'Florent',
                'last_name'                      => 'Feougier',
                'email'                          => 'flofgr@pm.me',
                'password'                       => Hash::make('LMCVG07BC'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "77.144.171.144",
                'signup_confirmation_ip_address' => "77.144.171.144",
            ]);

            $florent->profile()->save(new Profile());
            $florent->attachRole($userRole);
            $florent->save();
        }



        // Florent test user
        $myrtille = User::where('email', '=', 'e.varlet03@live.fr')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'evarlet',
                'first_name'                     => 'E',
                'last_name'                      => '',
                'email'                          => 'e.varlet03@live.fr',
                'password'                       => "$2y$10\$RoHswd0uUu8ZBauUgF8Y3Ox6H7AwtOSg/g3dKW8TKKl...",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "90.114.241.135",
                'signup_confirmation_ip_address' => "90.114.241.135",
                'created_at' => "2019-11-10 15:51:50",
                'updated_at' => "2019-11-10 15:51:50",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }

        // Florent test user
        $myrtille = User::where('email', '=', 'cecile.v.maury@gmail.com')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'cecilemaury',
                'first_name'                     => 'Cecile',
                'last_name'                      => 'Maury',
                'email'                          => 'cecile.v.maury@gmail.com',
                'password'                       => "$2y$10\$RoHswd0uUu8ZBauUgF8Y3Ox6H7AwtOSg/g3dKW8TKKl...",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "78.112.173.245",
                'signup_confirmation_ip_address' => "78.112.173.245",
                'created_at' => "2019-11-07 12:30:11",
                'updated_at' => "2019-11-07 12:30:11",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }


        // Florent test user
        $myrtille = User::where('email', '=', 'mariecolin03@gmail.com')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'mariecolin',
                'first_name'                     => 'Marie',
                'last_name'                      => 'Colin',
                'email'                          => 'mariecolin03@gmail.com',
                'password'                       => "$2y$10$35fyyCpTNLwwzQeEP6pa3.lSZROvg2MLL02pLW.lpXQ...",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "93.23.105.193",
                'signup_confirmation_ip_address' => "93.23.105.193",
                'created_at' => "2019-11-06 19:14:15",
                'updated_at' => "2019-11-06 19:14:15",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }


                                // Florent test user
                                $myrtille = User::where('email', '=', 'g.morgane@hotmail.com')->first();
                                if ($myrtille === null) {
                                    $myrtille = User::create([
                                        'name'                           => 'gmorganne',
                                        'first_name'                     => 'Morgane',
                                        'last_name'                      => '',
                                        'email'                          => 'g.morgane@hotmail.com',
                                        'password'                       => "$2y$10\$U4S6yuBGFNjlIq25vLcBte53VVzlUWQB9cn5L7.QoRA...",
                                        'token'                          => str_random(64),
                                        'activated'                      => true,
                                        'signup_ip_address'              => "89.83.1.195",
                                        'signup_confirmation_ip_address' => "89.83.1.195",
                                        'created_at' => "2019-11-06 18:48:02",
                                        'updated_at' => "2019-11-06 18:48:02",
                                    ]);

                                    $myrtille->profile()->save(new Profile());
                                    $myrtille->attachRole($userRole);
                                    $myrtille->save();
                                }



                        // Florent test user
                        $myrtille = User::where('email', '=', 'martin.viger63@gmail.com')->first();
                        if ($myrtille === null) {
                            $myrtille = User::create([
                                'name'                           => 'martinviger',
                                'first_name'                     => 'Martin',
                                'last_name'                      => 'Viger',
                                'email'                          => 'martin.viger63@gmail.com',
                                'password'                       => "$2y$10\$U4S6yuBGFNjlIq25vLcBte53VVzlUWQB9cn5L7.QoRA...",
                                'token'                          => str_random(64),
                                'activated'                      => true,
                                'signup_ip_address'              => "37.167.20.115",
                                'signup_confirmation_ip_address' => "37.167.20.115",
                                'created_at' => "2019-11-06 18:48:02",
                                'updated_at' => "2019-11-06 18:48:02",
                            ]);

                            $myrtille->profile()->save(new Profile());
                            $myrtille->attachRole($userRole);
                            $myrtille->save();
                        }



                                                // Florent test user
                                                $myrtille = User::where('email', '=', 'orane.debrune@outlook.fr')->first();
                                                if ($myrtille === null) {
                                                    $myrtille = User::create([
                                                        'name'                           => 'oranedebrune',
                                                        'first_name'                     => 'Orane',
                                                        'last_name'                      => 'Debrune',
                                                        'email'                          => 'orane.debrune@outlook.fr',
                                                        'password'                       => "$2y$10\$U4S6yuBGFNjlIq25vLcBte53VVzlUWQB9cn5L7.QoRA...",
                                                        'token'                          => str_random(64),
                                                        'activated'                      => true,
                                                        'signup_ip_address'              => "90.114.241.135",
                                                        'signup_confirmation_ip_address' => "90.114.241.135",
                                                        'created_at' => "2019-11-06 18:38:43",
                                                        'updated_at' => "2019-11-06 18:40:43",
                                                    ]);

                                                    $myrtille->profile()->save(new Profile());
                                                    $myrtille->attachRole($userRole);
                                                    $myrtille->save();
                                                }


                        // Florent test user
                        $myrtille = User::where('email', '=', 'e.varlet03@live.fr')->first();
                        if ($myrtille === null) {
                            $myrtille = User::create([
                                'name'                           => 'evarlet',
                                'first_name'                     => 'E',
                                'last_name'                      => 'Varlet',
                                'email'                          => 'e.varlet03@live.fr',
                                'password'                       => "$2y$10\$U4S6yuBGFNjlIq25vLcBte53VVzlUWQB9cn5L7.QoRA...",
                                'token'                          => str_random(64),
                                'activated'                      => true,
                                'signup_ip_address'              => "90.114.241.135",
                                'signup_confirmation_ip_address' => "90.114.241.135",
                                'created_at' => "2019-11-06 18:34:43",
                                'updated_at' => "2019-11-06 18:34:43",
                            ]);

                            $myrtille->profile()->save(new Profile());
                            $myrtille->attachRole($userRole);
                            $myrtille->save();
                        }



                // Florent test user
                $myrtille = User::where('email', '=', 'estelle.paulet0@gmail.com')->first();
                if ($myrtille === null) {
                    $myrtille = User::create([
                        'name'                           => 'estellepaulet',
                        'first_name'                     => 'Estelle',
                        'last_name'                      => 'Paulet',
                        'email'                          => 'estelle.paulet0@gmail.com',
                        'password'                       => "$2y$10\$U4S6yuBGFNjlIq25vLcBte53VVzlUWQB9cn5L7.QoRA...",
                        'token'                          => str_random(64),
                        'activated'                      => true,
                        'signup_ip_address'              => "91.168.175.2",
                        'signup_confirmation_ip_address' => "91.168.175.2",
                        'created_at' => "2019-11-06 18:34:43",
                        'updated_at' => "2019-11-06 18:34:43",
                    ]);

                    $myrtille->profile()->save(new Profile());
                    $myrtille->attachRole($userRole);
                    $myrtille->save();
                }


        // Florent test user
        $myrtille = User::where('email', '=', 'johanna_ch@hotmail.fr')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'johanna',
                'first_name'                     => 'Johanna',
                'last_name'                      => 'Chaudron',
                'email'                          => 'johanna_ch@hotmail.fr',
                'password'                       => "$2y$10\$evH0t2UHnQf41JFo4fgNie8LVBs7SBG6J42YFftGOjlnelx7hYIpa",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "90.125.2.75",
                'signup_confirmation_ip_address' => "90.125.2.75",
                'created_at' => "2019-11-04 21:16:57",
                'updated_at' => "2019-11-04 21:16:57",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }



                                // Florent test user
                                $myrtille = User::where('email', '=', 'orane.deb@gmail.com')->first();
                                if ($myrtille === null) {
                                    $myrtille = User::create([
                                        'name'                           => 'lailadeb',
                                        'first_name'                     => 'Laïla',
                                        'last_name'                      => 'Deb',
                                        'email'                          => 'orane.deb@gmail.com',
                                        'password'                       => "$2y$10\$evH0t2UHnQf41JFo4fgNie8LVBs7SBG6J42YFftGOjlnelx7hYIpa",
                                        'token'                          => str_random(64),
                                        'activated'                      => true,
                                        'signup_ip_address'              => "37.170.148.129",
                                        'signup_confirmation_ip_address' => "37.170.148.129",
                                        'created_at' => "2019-11-06 18:36:46",
                                        'updated_at' => "2019-11-06 18:36:46",
                                    ]);

                                    $myrtille->profile()->save(new Profile());
                                    $myrtille->attachRole($userRole);
                                    $myrtille->save();
                                }


                        // Florent test user
                        $myrtille = User::where('email', '=', 'carole.tilly@hotmail.fr')->first();
                        if ($myrtille === null) {
                            $myrtille = User::create([
                                'name'                           => 'carole',
                                'first_name'                     => 'Carole',
                                'last_name'                      => 'Till',
                                'email'                          => 'carole.tilly@hotmail.fr',
                                'password'                       => "$2y$10\$evH0t2UHnQf41JFo4fgNie8LVBs7SBG6J42YFftGOjlnelx7hYIpa",
                                'token'                          => str_random(64),
                                'activated'                      => true,
                                'signup_ip_address'              => "79.81.15.27",
                                'signup_confirmation_ip_address' => "79.81.15.27",
                                'created_at' => "2019-11-06 18:36:29",
                                'updated_at' => "2019-11-06 18:36:29",
                            ]);

                            $myrtille->profile()->save(new Profile());
                            $myrtille->attachRole($userRole);
                            $myrtille->save();
                        }


                // Florent test user
                $myrtille = User::where('email', '=', 'rozozo000@gmail.com')->first();
                if ($myrtille === null) {
                    $myrtille = User::create([
                        'name'                           => 'rozozo',
                        'first_name'                     => 'Rozozo',
                        'last_name'                      => '',
                        'email'                          => 'rozozo000@gmail.com',
                        'password'                       => "$2y$10\$V6B284GWhTWJGN6snwwfHOF3ZtxCdrRB25IskT8BpzQlUlkxt7Bym",
                        'token'                          => str_random(64),
                        'activated'                      => true,
                        'signup_ip_address'              => "31.36.187.177",
                        'signup_confirmation_ip_address' => "31.36.187.177",
                        'created_at' => "2019-11-06 18:37:07",
                        'updated_at' => "2019-11-06 18:37:07",
                    ]);

                    $myrtille->profile()->save(new Profile());
                    $myrtille->attachRole($userRole);
                    $myrtille->save();
                }

        // Florent test user
        $myrtille = User::where('email', '=', 'lucilevelut@orange.fr')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'lucilevelut',
                'first_name'                     => 'Lucie',
                'last_name'                      => 'Levelut',
                'email'                          => 'lucilevelut@orange.fr',
                'password'                       => "$2y$10\$jevUIYxQcH.BraEx1xcFRuD6SGkJjElDspDQR4vM/.VS9HUF3bdiu",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "80.214.76.105",
                'signup_confirmation_ip_address' => "80.214.76.105",
                'created_at' => "2019-11-06 18:46:58",
                'updated_at' => "2019-11-06 18:46:58",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }

        // Florent test user
        $myrtille = User::where('email', '=', 'martin.viger63@gmail.com')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'martin',
                'first_name'                     => 'Martin',
                'last_name'                      => 'Viget',
                'email'                          => 'martin.viger63@gmail.com',
                'password'                       => "$2y$10$8Thp9BSLnFyrLiEKs4zkQefLvxbTrgCr6d2SfOzv7x9EGxSaDjzdq",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "37.167.20.115",
                'signup_confirmation_ip_address' => "37.167.20.115",
                'created_at' => "2019-11-06 18:48:02",
                'updated_at' => "2019-11-06 18:48:02",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }

        // Florent test user
        $myrtille = User::where('email', '=', 'mrouchon92@gmail.com')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'mrouchon',
                'first_name'                     => 'Mrouchon',
                'last_name'                      => '',
                'email'                          => 'mrouchon92@gmail.com',
                'password'                       => "$2y$10$8Thp9BSLnFyrLiEKs4zkQefLvxbTrgCr6d2SfOzv7x9EGxSaDjzdq",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "92.184.101.11",
                'signup_confirmation_ip_address' => "92.184.101.11",
                'created_at' => "2019-11-06 18:49:12",
                'updated_at' => "2019-11-06 18:49:12",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }


        // Florent test user
        $myrtille = User::where('email', '=', 'luciegiat@icloud.com')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'lucie',
                'first_name'                     => 'Lucie',
                'last_name'                      => 'Giat',
                'email'                          => 'luciegiat@icloud.com',
                'password'                       => "$2y$10$280dGVyOMHW9tlzvwbXQwOXMAKs9CHupcvK6b.FKCID4Q.RsATPim",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "92.171.239.65",
                'signup_confirmation_ip_address' => "92.171.239.65",
                'created_at' => "2019-11-06 18:55:19",
                'updated_at' => "2019-11-06 18:55:19",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }


        // Florent test user
        $myrtille = User::where('email', '=', 'corselyne@hotmail.com')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'corselyne',
                'first_name'                     => 'Corselyne',
                'last_name'                      => '',
                'email'                          => 'corselyne@hotmail.com',
                'password'                       => "$2y$10$35fyyCpTNLwwzQeEP6pa3.lSZROvg2MLL02pLW.lpXQ...",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "91.163.121.155",
                'signup_confirmation_ip_address' => "91.163.121.155",
                'created_at' => "2019-11-06 19:07:10",
                'updated_at' => "2019-11-06 19:07:10",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }


        // Florent test user
        $myrtille = User::where('email', '=', 'adelesignoret9@orange.fr')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'adele',
                'first_name'                     => 'Adele',
                'last_name'                      => 'Signoret',
                'email'                          => 'adelesignoret9@orange.fr',
                'password'                       => "$2y$10$35fyyCpTNLwwzQeEP6pa3.lSZROvg2MLL02pLW.lpXQ...",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "91.163.121.155",
                'signup_confirmation_ip_address' => "91.163.121.155",
                'created_at' => "2019-11-06 19:07:10",
                'updated_at' => "2019-11-06 19:07:10",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }

                        // Florent test user
                        $myrtille = User::where('email', '=', 'elpicolus@gmail.com')->first();
                        if ($myrtille === null) {
                            $myrtille = User::create([
                                'name'                           => 'nicolase',
                                'first_name'                     => 'Nicolas',
                                'last_name'                      => 'Epicolus',
                                'email'                          => 'elpicolus@gmail.com',
                                'password'                       => "$2y$10\$zjT.qUg1DCaKqSr7ottYf.mmKHsnRb/lEcPAweD9.An...",
                                'token'                          => str_random(64),
                                'activated'                      => true,
                                'signup_ip_address'              => "176.190.9.187",
                                'signup_confirmation_ip_address' => "176.190.9.187",
                                'created_at' => "2019-11-06 19:14:15",
                                'updated_at' => "2019-11-06 19:14:15",
                            ]);

                            $myrtille->profile()->save(new Profile());
                            $myrtille->attachRole($userRole);
                            $myrtille->save();
                        }

                // Florent test user
                $myrtille = User::where('email', '=', 'lina-marche@hotmail.com')->first();
                if ($myrtille === null) {
                    $myrtille = User::create([
                        'name'                           => 'lina',
                        'first_name'                     => 'Lina',
                        'last_name'                      => '',
                        'email'                          => 'lina-marche@hotmail.com',
                        'password'                       => "$2y$10\$XyeyYh1.rKPfFX2qKvrjHucvW/RRQ.7kcyQm76Ohy/5rkb53pnNiO",
                        'token'                          => str_random(64),
                        'activated'                      => true,
                        'signup_ip_address'              => "88.160.201.45",
                        'signup_confirmation_ip_address' => "88.160.201.45",
                        'created_at' => "2019-11-06 19:45:43",
                        'updated_at' => "2019-11-06 19:45:43",
                    ]);

                    $myrtille->profile()->save(new Profile());
                    $myrtille->attachRole($userRole);
                    $myrtille->save();
                }

        // Florent test user
        $myrtille = User::where('email', '=', 'myrtillelbm@gmail.com')->first();
        if ($myrtille === null) {
            $myrtille = User::create([
                'name'                           => 'myrtille',
                'first_name'                     => 'Myrtille',
                'last_name'                      => '',
                'email'                          => 'myrtillelbm@gmail.com',
                'password'                       => "$2y\$10\$Q/1W.8Av4gaPdIFYLswct.KJ.f4GA6xJP8p3V/wwe1Q1WvAQLUAzC",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "93.23.197.255",
                'signup_confirmation_ip_address' => "93.23.197.255",
                'created_at' => "2019-11-07 15:05:21",
                'updated_at' => "2019-11-07 15:05:21",
            ]);

            $myrtille->profile()->save(new Profile());
            $myrtille->attachRole($userRole);
            $myrtille->save();
        }

        // Florent test user
        $crealyne = User::where('email', '=', 'flofgr@pm.me')->first();
        if ($crealyne === null) {
            $crealyne = User::create([
                'name'                           => 'crealyne',
                'first_name'                     => 'Créa Lyne',
                'last_name'                      => '',
                'email'                          => 'corselyne@hotmail.com',
                'password'                       => "\$2y\$10$3eXELOK87Ed38LWNuwrQH..AzH9.f17QsLQlDaJioOj...",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "88.189.88.52",
                'signup_confirmation_ip_address' => "88.189.88.52",
            ]);

            $crealyne->profile()->save(new Profile());
            $crealyne->attachRole($userRole);
            $crealyne->save();
        }

        // Florent test user
        $sarahcabrespine = User::where('email', '=', 'sarah.cabrespine@gmail.com')->first();
        if ($sarahcabrespine === null) {
            $sarahcabrespine = User::create([
                'name'                           => 'sarahcabrespine',
                'first_name'                     => 'Sarah',
                'last_name'                      => 'Cabrespine',
                'email'                          => 'sarah.cabrespine@gmail.com',
                'password'                       => "\$2y\$10\$eadx/4yguvnL3qFg4RIAOu3vATQGB4QtYO56hP4PBBvzP1Y109jjS",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "92.184.101.98",
                'signup_confirmation_ip_address' => "92.184.101.98",
            ]);

            $sarahcabrespine->profile()->save(new Profile());
            $sarahcabrespine->attachRole($userRole);
            $sarahcabrespine->save();
        }

        // Florent test user
        $marion = User::where('email', '=', 'marion.taborda@yahoo.fr')->first();
        if ($marion === null) {
            $marion = User::create([
                'name'                           => 'mariontaborda',
                'first_name'                     => 'Marion',
                'last_name'                      => 'Taborda',
                'email'                          => 'marion.taborda@yahoo.fr',
                'password'                       => "\$2y\$10\$PAYlOrXOJJWz2.HmsZCS9uWrlRTIoXpy6F8w/PUnWyitFVKkEKGRq",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "88.187.61.122",
                'signup_confirmation_ip_address' => "88.187.61.122",
                'created_at' => "2019-11-10 17:09:12",
                'updated_at' => "2019-11-10 17:09:12",
            ]);

            $marion->profile()->save(new Profile());
            $marion->attachRole($userRole);
            $marion->save();
        }



        // Florent test user
        $annesophie = User::where('email', '=', 'lmarcela@laposte.net')->first();
        if ($annesophie === null) {
            $annesophie = User::create([
                'name'                           => 'laurine',
                'first_name'                     => 'Laurine',
                'last_name'                      => '',
                'email'                          => 'lmarcela@laposte.net',
                'password'                       => "$2y\$10\$QIGQWNryUCBK1SGbVVPogu.xdVTeiAm8yhOS8O9kdqaOk1NTjI27O",
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => "88.157.97.9",
                'signup_confirmation_ip_address' => "88.157.97.9",
                'created_at' => "2019-11-10 17:06:46",
                'updated_at' => "2019-11-10 17:06:46",
            ]);

            $annesophie->profile()->save(new Profile());
            $annesophie->attachRole($userRole);
            $annesophie->save();
        }

          // Florent test user
          $annesophie = User::where('email', '=', 'as.ricord@gmail.com')->first();
          if ($annesophie === null) {
              $annesophie = User::create([
                  'name'                           => 'annesophie',
                  'first_name'                     => 'Anne',
                  'last_name'                      => 'Sophie',
                  'email'                          => 'as.ricord@gmail.com',
                  'password'                       => "\$2y\$10\$PAYlOrXOJJWz2.HmsZCS9uWrlRTIoXpy6F8w/PUnWyitFVKkEKGRq",
                  'token'                          => str_random(64),
                  'activated'                      => true,
                  'signup_ip_address'              => "31.36.189.88",
                  'signup_confirmation_ip_address' => "31.36.189.88",
                  'created_at' => "2019-11-10 17:06:46",
                  'updated_at' => "2019-11-10 17:06:46",
              ]);

              $annesophie->profile()->save(new Profile());
              $annesophie->attachRole($userRole);
              $annesophie->save();
          }

          // Florent test user
          $annesophie = User::where('email', '=', 'samira.messaoudi@gmail.com')->first();
          if ($annesophie === null) {
              $annesophie = User::create([
                  'name'                           => 'samira',
                  'first_name'                     => 'Samira',
                  'last_name'                      => '',
                  'email'                          => 'samira.messaoudi@gmail.com',
                  'password'                       => "$2y\$10\$DUVfZDSa61MXBgRmLYmOMe95bhJEVEwbohA07Q/wiy4eu/nava5q2",
                  'token'                          => str_random(64),
                  'activated'                      => true,
                  'signup_ip_address'              => "171.16.208.3",
                  'signup_confirmation_ip_address' => "171.16.208.3",
                  'created_at' => "2019-11-08 16:04:24",
                  'updated_at' => "2019-11-08 16:04:24",
              ]);

              $annesophie->profile()->save(new Profile());
              $annesophie->attachRole($userRole);
              $annesophie->save();
          }


                    // Florent test user
                    $annesophie = User::where('email', '=', 'livy9.7.2@hotmail.fr')->first();
                    if ($annesophie === null) {
                        $annesophie = User::create([
                            'name'                           => 'livyjeanbaptiste',
                            'first_name'                     => 'Jean-Baptiste',
                            'last_name'                      => 'Livy',
                            'email'                          => 'livy9.7.2@hotmail.fr',
                            'password'                       => "$2y\$10\$pcvZTTIWVdUbns0YUUlVluHOHxWuWOOndnRNMjPaouNkW2gRWwmA2",
                            'token'                          => str_random(64),
                            'activated'                      => true,
                            'signup_ip_address'              => "92.184.102.160",
                            'signup_confirmation_ip_address' => "92.184.102.160",
                            'created_at' => "2019-11-08 15:29:34",
                            'updated_at' => "2019-11-08 15:29:34",
                        ]);

                        $annesophie->profile()->save(new Profile());
                        $annesophie->attachRole($userRole);
                        $annesophie->save();
                    }



                    // Florent test user
                    $annesophie = User::where('email', '=', 'alexandre.masse63000@gmail.com')->first();
                    if ($annesophie === null) {
                        $annesophie = User::create([
                            'name'                           => 'alexandre',
                            'first_name'                     => 'Alexandre',
                            'last_name'                      => '',
                            'email'                          => 'alexandre.masse63000@gmail.com',
                            'password'                       => "$2y\$10\$szwO8Sd/0REZT.6lG/Ty6.vQsG6m3NQYnzurdrrVWqtiL.vwet1.C",
                            'token'                          => str_random(64),
                            'activated'                      => true,
                            'signup_ip_address'              => "92.171.127.18",
                            'signup_confirmation_ip_address' => "92.171.127.18",
                            'created_at' => "2019-11-07 19:02:22",
                            'updated_at' => "2019-11-07 19:02:22",
                        ]);

                        $annesophie->profile()->save(new Profile());
                        $annesophie->attachRole($userRole);
                        $annesophie->save();
                    }
                    // Florent test user
                    $annesophie = User::where('email', '=', 'cattleya.sedilot@gmail.com')->first();
                    if ($annesophie === null) {
                        $annesophie = User::create([
                            'name'                           => 'cattleya',
                            'first_name'                     => 'cattleya',
                            'last_name'                      => 'Sophie',
                            'email'                          => 'cattleya.sedilot@gmail.com',
                            'password'                       => "\$2y\$10\$lw3uPllDaRNByfFHs6SGLeIngfJsQO5H1su2UBykqXlpSt.jGOvuu",
                            'token'                          => str_random(64),
                            'activated'                      => true,
                            'signup_ip_address'              => "79.80.210.77",
                            'signup_confirmation_ip_address' => "79.80.210.77",
                            'created_at' => "2019-11-10 13:01:07",
                            'updated_at' => "2019-11-10 13:01:07",
                        ]);

                        $annesophie->profile()->save(new Profile());
                        $annesophie->attachRole($userRole);
                        $annesophie->save();
                    }


                    // Florent test user
                    $annesophie = User::where('email', '=', 'oriane.auxerre@gmail.com')->first();
                    if ($annesophie === null) {
                        $annesophie = User::create([
                            'name'                           => 'oriane',
                            'first_name'                     => 'Oriane',
                            'last_name'                      => 'Auxerre',
                            'email'                          => 'oriane.auxerre@gmail.com',
                            'password'                       => "\$2y\$10\$dkMwUbSeteUAU7zWY3PkW.rB7CXDGGuybGatXhY1HUtm7BhSLpJhS",
                            'token'                          => str_random(64),
                            'activated'                      => true,
                            'signup_ip_address'              => "93.23.198.180",
                            'signup_confirmation_ip_address' => "93.23.198.180",
                            'created_at' => "2019-11-10 10:19:06",
                            'updated_at' => "2019-11-10 10:19:06",
                        ]);

                        $annesophie->profile()->save(new Profile());
                        $annesophie->attachRole($userRole);
                        $annesophie->save();
                    }


                                        // Florent test user
                                        $annesophie = User::where('email', '=', 'dasilva.claire@ymail.com')->first();
                                        if ($annesophie === null) {
                                            $annesophie = User::create([
                                                'name'                           => 'clairedass',
                                                'first_name'                     => 'Clairedass',
                                                'last_name'                      => '',
                                                'email'                          => 'dasilva.claire@ymail.com',
                                                'password'                       => "\$2y\$10\$ZbvVW/RFovALyjA5EazTxeiuwJO2PfuuF1t2ERFSxg9v8MIp9ywCG",
                                                'token'                          => str_random(64),
                                                'activated'                      => true,
                                                'signup_ip_address'              => "2.3.133.211",
                                                'signup_confirmation_ip_address' => "87.88.186.81",
                                                'created_at' => "2019-11-09 06:04:47",
                                                'updated_at' => "2019-11-09 06:04:47",
                                            ]);

                                            $annesophie->profile()->save(new Profile());
                                            $annesophie->attachRole($userRole);
                                            $annesophie->save();
                                        }



                                                                                // Florent test user
                                                                                $annesophie = User::where('email', '=', 'chrisperonnet@aol.com')->first();
                                                                                if ($annesophie === null) {
                                                                                    $annesophie = User::create([
                                                                                        'name'                           => 'christineperonnet',
                                                                                        'first_name'                     => 'Christine',
                                                                                        'last_name'                      => 'PERONNET',
                                                                                        'email'                          => 'chrisperonnet@aol.com',
                                                                                        'password'                       => "\$2y\$10\$LDMZ.vOT3B9qfh3x4ovJO.Nu.Qn8MfWRToKk/ZvZNL61BcdFLUj9W",
                                                                                        'token'                          => str_random(64),
                                                                                        'activated'                      => true,
                                                                                        'signup_ip_address'              => "88.177.166.90",
                                                                                        'signup_confirmation_ip_address' => "88.177.166.90",
                                                                                        'created_at' => "2019-11-08 19:02:04",
                                                                                        'updated_at' => "2019-11-08 19:02:04",
                                                                                    ]);

                                                                                    $annesophie->profile()->save(new Profile());
                                                                                    $annesophie->attachRole($userRole);
                                                                                    $annesophie->save();
                                                                                }


    }
}

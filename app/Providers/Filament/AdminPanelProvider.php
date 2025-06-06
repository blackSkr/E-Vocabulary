<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\Register;
use App\Models\Kosakata;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
//         dd([
//     'resources' => $panel->getResources(),
//     'pages' => $panel->getPages(),
//     'widgets' => $panel->getWidgets(),
//     'middlewares' => $panel->getMiddlewares(),
// ]);

        return $panel
        
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('UPTVocab')
            ->discoverClusters(
                in: app_path('Filament/Clusters'),
                for: 'App\\Filament\\Clusters'
            )
            // ->discoverClusters(in: app_path('Filament/Clusters'))
            ->registration(Register::class) 
            ->colors([
                // 'primary' => Color::Amber,
                'primary' => Color::hex('#3F7D58')
            ])
                        
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Manajemen Data')
                    ->icon('heroicon-o-bookmark-square'),
                NavigationGroup::make()
                    ->label('Manajemen Kosakata')
                    ->icon('heroicon-o-book-open'),
                    // ->sort(-1)
                NavigationGroup::make()
                    ->label('Manajemen Pengguna')
                    ->icon('heroicon-o-cog-8-tooth'),

            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                // Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make()
                    ->gridColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 3
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 4,
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                    ]),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
            
    }
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerRenderHook(
                'panels::global-search.after',
                fn (): string => view('filament.components.kosakata-notification')->render(),
            );
        });
    }
    
    
}

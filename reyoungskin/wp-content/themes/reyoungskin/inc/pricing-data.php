<?php

/**
 * Pricing Menu Data Structure
 *
 * @package ReyoungSkin
 */

function reyoungskin_get_pricing_data()
{
    return [
        'left_column' => [
            [
                'title' => 'Nano Hydration Infusion & LED Light',
                'price' => '$99',
                'was_price' => '$159',
                'paragraphs' => [
                    'A deeply hydrating treatment that infuses your skin with moisture using nano-technology, followed by LED light therapy to boost collagen production and reduce inflammation.',
                    'Perfect for dehydrated skin, fine lines, and dull complexion. Leaves your skin plump, radiant, and refreshed.',
                ],
            ],
            [
                'title' => 'Purifying Facial (Enzyme Exfoliation)',
                'price' => '$89',
                'was_price' => '$120',
                'paragraphs' => [
                    'A gentle yet effective treatment using natural enzymes to remove dead skin cells, unclog pores, and reveal brighter, smoother skin.',
                    'Ideal for congested skin, blackheads, and uneven texture. Non-abrasive and suitable for sensitive skin.',
                ],
            ],
            [
                'title' => 'Chemical Peel + LED Light',
                'price' => '$99',
                'was_price' => '$139',
                'paragraphs' => [
                    'A professional-grade chemical peel tailored to your skin concerns, followed by LED light therapy to accelerate healing and enhance results.',
                    'Targets pigmentation, acne scars, fine lines, and sun damage. Reveals fresh, even-toned skin with improved texture.',
                ],
            ],
            [
                'title' => 'Microneedling',
                'price' => '$150',
                'was_price' => '$260',
                'paragraphs' => [
                    'Ideal for reducing fine lines, wrinkles, acne scars, enlarged pores, and improving overall skin texture and firmness.',
                ],
                'subsections' => [
                    [
                        'heading' => 'How Microneedling Works',
                        'text' => 'Tiny needles create controlled micro-injuries in the skin, triggering your body\'s natural healing response and boosting collagen and elastin production for smoother, firmer skin.',
                    ],
                    [
                        'heading' => 'Key ingredients:',
                        'text' => 'Medical-grade serums with hyaluronic acid, peptides, and growth factors are applied during treatment to maximize penetration and results.',
                    ],
                ],
                'note' => 'Numbing cream is applied to ensure your comfort throughout the treatment.',
            ],
            [
                'title' => 'Salmon DNA Microneedling',
                'price' => '$190',
                'was_price' => '$299',
                'paragraphs' => [
                    'Ideal for anti-aging, deep hydration, reducing fine lines and wrinkles, improving skin elasticity, and repairing damaged skin.',
                    'This advanced treatment combines microneedling with premium salmon DNA (PDRN) – a powerful regenerative ingredient that accelerates skin repair, boosts collagen, and provides intense hydration.',
                    'Salmon DNA has been proven to improve skin density, reduce inflammation, and promote cellular regeneration for a youthful, radiant complexion.',
                ],
                'note' => 'Topical numbing cream is applied for your comfort.',
                'subsections' => [
                    [
                        'heading' => 'Why Salmon DNA Microneedling is superior?',
                        'bullets' => [
                            'Enhanced healing and faster skin recovery',
                            'Superior hydration compared to standard serums',
                            'Proven anti-aging and regenerative properties',
                            'Reduces pigmentation and evens skin tone',
                            'Long-lasting results with minimal downtime',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Scalp Microneedling (Hair Growth Support)',
                'price' => '$149',
                'paragraphs' => [
                    'Stimulates hair follicles, improves scalp circulation, and enhances the absorption of hair growth serums. A natural approach to supporting thicker, healthier hair growth.',
                ],
            ],
        ],
        'right_column' => [
            [
                'title' => 'INNO-EXOMA® Exosome Skin Treatment 45 mins',
                'price' => '$350',
                'was_price' => '$490',
                'subsections' => [
                    [
                        'heading' => 'Ideal For:',
                        'text' => 'Anyone seeking advanced anti-aging, skin regeneration, and long-term rejuvenation with cutting-edge biotechnology.',
                    ],
                    [
                        'heading' => 'Why Choose This Treatment?',
                        'text' => 'Exosomes are tiny messengers that communicate directly with your skin cells, triggering repair, regeneration, and rejuvenation at a cellular level. This is one of the most advanced non-invasive anti-aging treatments available today.',
                    ],
                    [
                        'heading' => 'Key Benefits:',
                        'bullets' => [
                            'Reduces fine lines and wrinkles',
                            'Improves skin firmness and elasticity',
                            'Fades pigmentation and evens skin tone',
                            'Accelerates healing and reduces inflammation',
                            'Delivers deep, long-lasting hydration',
                            'Promotes collagen and elastin production',
                        ],
                    ],
                    [
                        'heading' => 'How It Works:',
                        'text' => 'Exosomes are applied to the skin via microneedling or mesotherapy, delivering powerful growth factors and proteins deep into the dermis to stimulate cellular renewal.',
                    ],
                    [
                        'heading' => 'Treatment Plan:',
                        'text' => 'Best results with 3–4 sessions spaced 2–4 weeks apart.',
                    ],
                    [
                        'heading' => 'Procedure:',
                        'text' => 'Cleanse → Numbing (if needed) → Microneedling/Application → Exosome Serum → LED Light → Soothing Mask.',
                    ],
                ],
            ],
            [
                'title' => 'Microdermabrasion + Blackhead removal',
                'price' => '$65',
                'extra_price' => '$89 LED included',
                'was_price' => '$129',
                'paragraphs' => [
                    'A dual-action treatment that exfoliates the skin surface with microdermabrasion crystals while manually extracting blackheads and congestion.',
                    'Leaves skin smooth, clear, and refreshed with a healthy glow.',
                ],
            ],
            [
                'title' => 'Microdermabrasion + Nano Hydration Infusion + LED Light',
                'price' => '$119',
                'was_price' => '$189',
                'paragraphs' => [
                    'The ultimate skin renewal combo: exfoliation + hydration + light therapy in one power-packed session.',
                    'Perfect for brightening, smoothing texture, and restoring radiance.',
                ],
            ],
            [
                'title' => 'Plasma Pen / Plasma Fibroblast',
                'subitems' => [
                    [
                        'title' => 'Skin Tags / Moles Removal',
                        'price' => '~$30–$150+',
                        'text' => 'Safe, precise removal of unwanted skin tags and moles using plasma technology.',
                    ],
                    [
                        'title' => 'Sun/ Dark Spots Removal',
                        'price' => '$50+',
                        'text' => 'Target and fade sun damage, age spots, and hyperpigmentation.',
                    ],
                    [
                        'title' => 'Small Area Face Lines Treatment',
                        'price' => '~$190–$290+',
                        'text' => 'Non-surgical skin tightening for fine lines around eyes, mouth, and forehead.',
                    ],
                ],
            ],
            [
                'title' => 'Facial Massage & Reflexology',
                'price' => '$50 (30mins) / $65 (45mins)',
                'paragraphs' => [
                    'A relaxing, therapeutic massage that promotes lymphatic drainage, reduces puffiness, and releases facial tension while incorporating reflexology techniques to restore balance and wellbeing.',
                ],
            ],
        ],
    ];
}

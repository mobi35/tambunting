For Table naming:
poker_events        > events
poker_tournaments   > tournaments
poker_tours         > tours

live_reports        > event_reports
live_report_players > event_chips (remove chips_before)

payouts             > event_payouts
 
DROP: chip_counts
 

Table: live_reports
featured_image      > image
Keep *created and updated* last in the table

Concerning:
live_report_players
live_report_live_report_players
Payouts

Idea:
Remove: live_report_live_report_players

Adjust: live_report_players
id / player_id / event_id / report_id / chip_count / created_at / updated_at

Payouts:
id / player_id / event_id / report_id / place / prize / created_at / updated_at








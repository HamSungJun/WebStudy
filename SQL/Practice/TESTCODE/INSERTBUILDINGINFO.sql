
prompt 'Create New_Building record';
prompt 'insert Building infomation';
prompt;

prompt 'List of Buildings : ';
prompt;
SELECT * FROM Building;
prompt;

accept building_Name char format a20 prompt 'Building Name : ';
accept college_NAme char format a20 prompt 'College Name : ';
accept building_Call number format 99999999999 default 00000000000 prompt 'building_Call [00000000000] : ';
accept popularity number format 9 default 0 prompt 'Popularity [ 1 <= X <= 5 ] : ';

insert into Building values ('&building_Name' , '&college_Name' , &building_Call , &popularity );
-- Adminer 4.7.6 PostgreSQL dump

DROP TABLE IF EXISTS "hocsinh";
DROP SEQUENCE IF EXISTS hocsinh_id_seq;
CREATE SEQUENCE hocsinh_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."hocsinh" (
    "id" integer DEFAULT nextval('hocsinh_id_seq') NOT NULL,
    "ten" character varying,
    "tuoi" integer,
    CONSTRAINT "hocsinh_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "hocsinh" ("id", "ten", "tuoi") VALUES
(1,	'Nguyễn Văn A',	12),
(3,	'Nguyễn Văn C',	16),
(4,	'Nguyễn Thị D',	14),
(5,	'Nguyễn Văn E',	14);

-- 2020-03-02 18:33:05.00993+07

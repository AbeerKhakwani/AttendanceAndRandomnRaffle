--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cuisines; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE cuisines (
    id integer NOT NULL,
    type character varying
);


ALTER TABLE cuisines OWNER TO "Guest";

--
-- Name: cuisines_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE cuisines_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cuisines_id_seq OWNER TO "Guest";

--
-- Name: cuisines_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE cuisines_id_seq OWNED BY cuisines.id;


--
-- Name: cuisines_restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE cuisines_restaurants (
    id integer NOT NULL,
    cuisine_id integer,
    restaurant_id integer
);


ALTER TABLE cuisines_restaurants OWNER TO "Guest";

--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE cuisines_restaurants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cuisines_restaurants_id_seq OWNER TO "Guest";

--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE cuisines_restaurants_id_seq OWNED BY cuisines_restaurants.id;


--
-- Name: likes; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE likes (
    id integer NOT NULL,
    answer integer,
    restaurant_id integer,
    user_id integer
);


ALTER TABLE likes OWNER TO "Guest";

--
-- Name: likes_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE likes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE likes_id_seq OWNER TO "Guest";

--
-- Name: likes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE likes_id_seq OWNED BY likes.id;


--
-- Name: prices; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE prices (
    id integer NOT NULL,
    level integer
);


ALTER TABLE prices OWNER TO "Guest";

--
-- Name: prices_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE prices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prices_id_seq OWNER TO "Guest";

--
-- Name: prices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE prices_id_seq OWNED BY prices.id;


--
-- Name: restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE restaurants (
    id integer NOT NULL,
    name character varying,
    address character varying,
    phone character varying,
    price integer,
    vegie integer,
    opentime integer,
    closetime integer
);


ALTER TABLE restaurants OWNER TO "Guest";

--
-- Name: restaurants_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE restaurants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE restaurants_id_seq OWNER TO "Guest";

--
-- Name: restaurants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE restaurants_id_seq OWNED BY restaurants.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying,
    password character varying
);


ALTER TABLE users OWNER TO "Guest";

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO "Guest";

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY cuisines ALTER COLUMN id SET DEFAULT nextval('cuisines_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY cuisines_restaurants ALTER COLUMN id SET DEFAULT nextval('cuisines_restaurants_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY likes ALTER COLUMN id SET DEFAULT nextval('likes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY prices ALTER COLUMN id SET DEFAULT nextval('prices_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY restaurants ALTER COLUMN id SET DEFAULT nextval('restaurants_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: cuisines; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY cuisines (id, type) FROM stdin;
1	Bakery
2	Bar
3	Barbecue
4	Breakfast
5	Burgers
6	Cafe
7	Chicken
8	Chinese
9	Deli
10	FastFood
11	German
12	Irish
13	Italian
14	Japanese
15	Kebab
16	Mediterranean
17	Mexican
18	Pizza
19	Polish
20	Sandwich
21	Seafood
22	Sushi
23	Thai
24	Wrap
25	Noodles
26	Korean
27	Indian
28	Soup
29	Vietnamese
30	French
31	American
\.


--
-- Name: cuisines_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('cuisines_id_seq', 31, true);


--
-- Data for Name: cuisines_restaurants; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY cuisines_restaurants (id, cuisine_id, restaurant_id) FROM stdin;
8	16	16
9	11	17
10	20	18
11	25	19
12	17	20
13	3	21
14	5	22
15	23	23
16	26	24
17	19	25
18	27	26
19	20	27
20	20	28
21	17	29
22	28	30
23	17	31
24	16	32
25	29	33
26	18	34
27	1	35
28	18	36
29	27	37
30	31	38
31	17	39
32	12	40
33	21	41
34	30	42
35	18	43
36	8	44
37	3	45
38	20	46
39	31	47
40	31	48
41	31	49
\.


--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('cuisines_restaurants_id_seq', 41, true);


--
-- Data for Name: likes; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY likes (id, answer, restaurant_id, user_id) FROM stdin;
\.


--
-- Name: likes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('likes_id_seq', 1, false);


--
-- Data for Name: prices; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY prices (id, level) FROM stdin;
\.


--
-- Name: prices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('prices_id_seq', 1, false);


--
-- Data for Name: restaurants; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY restaurants (id, name, address, phone, price, vegie, opentime, closetime) FROM stdin;
16	Small Pharoah	SW 5th & Stark	917 500 9181	1	1	700	1800
17	Deutschland Curry	SW 5th & Stark	503 866 5903	1	0	1100	1500
18	Left Coast	SW 5th & Stark	513 520 3206	1	0	1030	1600
19	Chez Dodo	SW 5th & Stark	503 284 4575	1	1	1100	2300
20	Don Pedro	SW 5th & Stark		1	0	1000	2100
21	Hawaiian Grill	SW 5th & Stark		1	1	1000	1600
22	BrunchBox	SW 5th & Stark	503 477 3286	2	1	800	1800
23	Khob Khun Thai Food	SW 5th & Stark	503 702 5844	1	1	1100	1700
24	Korean Twist	SW 5th & Stark		1	1	1100	1600
25	Schnitzelwich	SW 5th & Stark	503 997 5467	1	1	1000	1500
26	Real Taste of India	SW 5th & Stark	503 295 5564	1	1	1100	1900
27	Kingsland Kitchen	SW 5th & Stark	971 300 3118	2	1	1100	1500
28	Steaks Fifth Ave	SW 5th & Stark	503 422 8993	2	0	1030	1530
29	Mr. Taco	SW 5th & Stark	503 935 4321	1	1	800	1400
30	Spoons	SW 5th & Stark	503 522 3576	1	1	1030	1400
31	La Jarochita	SW 5th & Stark	503 421 9838	1	1	700	1800
32	Aybla Grill	SW 5th & Stark	503 490 3387	1	1	1100	1730
33	Saigon To-go	SW 5th & Stark	503 706 3232	1	1	1100	1500
34	Lonesomes Pizza	1 SW 3rd Ave	503 234 0114	1	1	1100	1600
35	Voodoo Doughnut	22 SW 3rd Ave		1	1	0	2400
36	Pizza Vita	36 SW 3rd Ave	503 548 2917	1	1	1000	1800
37	Tandoor Indian Kitchen	406 SW Oak St	503 243 7777	2	1	1130	1400
38	The Original Dinerant	300 SW 6th Ave	503 546 2666	2	1	630	2200
39	Santeria	703 SW Ankeny St	503 956 7624	1	1	1100	200
40	Kells Irish Restaurant and Pub	112 SW 2nd Ave	503 227 4057	2	1	1130	100
41	Dan & Louis Oyster Bar	208 SW Ankeny St	503 227 5906	2	1	1100	2100
42	Little Bird	219 SW 6th Ave	503 688 5952	2	1	1130	2400
43	Sizzle Pie	926 W Burnside St	503 234 7437	1	1	1100	245
44	Chens Good Taste Restaurant	18 NW 4th Ave	503 223 3838	2	0	1000	2000
45	Polli-Tico	SW 3rd Ave	971 258 2845	1	1	1100	1800
46	Bunk	211 SW 6th Ave	503 328 2865	2	1	800	1500
47	Cultered Caveman	220 SW Stark St		1	1	1100	1600
48	Hubers Cafe	411 SW 3rd Ave	503 228 5686	2	1	1130	2400
49	Portland City Grill	111 5th Ave 30th Floor	503 450 0030	3	1	1100	2400
\.


--
-- Name: restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('restaurants_id_seq', 49, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY users (id, username, password) FROM stdin;
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- Name: cuisines_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY cuisines
    ADD CONSTRAINT cuisines_pkey PRIMARY KEY (id);


--
-- Name: cuisines_restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY cuisines_restaurants
    ADD CONSTRAINT cuisines_restaurants_pkey PRIMARY KEY (id);


--
-- Name: likes_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY likes
    ADD CONSTRAINT likes_pkey PRIMARY KEY (id);


--
-- Name: prices_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY prices
    ADD CONSTRAINT prices_pkey PRIMARY KEY (id);


--
-- Name: restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY restaurants
    ADD CONSTRAINT restaurants_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: epicodus
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM epicodus;
GRANT ALL ON SCHEMA public TO epicodus;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--


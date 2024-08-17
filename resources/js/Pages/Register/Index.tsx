import { Link } from "@inertiajs/react";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import Button from "@narsil-ui/Components/Button/Button";
import Form from "@narsil-forms/Components/Form/Form";
import FormProvider from "@narsil-forms/Components/Form/FormProvider";
import FormRenderer from "@narsil-forms/Components/Form/FormRenderer";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFooter from "@narsil-ui/Components/Section/SectionFooter";
import SectionFullscreenToggle from "@narsil-ui/Components/Section/SectionFullscreenToggle";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";
import useForm from "@narsil-forms/Components/Form/useForm";

interface Props {
	form: FormModel;
}

const Index = ({ form }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("register")}>
				<Section>
					<SectionHeader>
						<SectionTitle>{form.title}</SectionTitle>
						<SectionFullscreenToggle />
					</SectionHeader>
					<SectionContent>
						<FormRenderer nodes={form.nodes} />
						<div className='flex flex-wrap items-center gap-x-1'>
							<span>{trans("Already have an account?")}</span>
							<Button
								size='link'
								type='button'
								variant='inline-link'
								asChild={true}
							>
								<Link href={route("login")}>{trans("Sign in")}</Link>
							</Button>
						</div>
					</SectionContent>
					<SectionFooter>
						<Button type='submit'>{trans("Sign up")}</Button>
					</SectionFooter>
				</Section>
			</Form>
		</FormProvider>
	);
};

export default Index;
